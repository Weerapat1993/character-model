<template>
    <div>
        <div class="text-center">
            <a class="btn btn-default" @click="showCreateClientForm">
                Create New Gallery
            </a>
        </div>

        <hr />
        <div class="row">
            <span v-for="gallery in galleries">
                <gallery-item :gallery='gallery'></gallery-item>
            </span>
        </div>

        <!-- Create Client Modal -->
        <gallery-form 
            :formData='createForm' 
            id='modal-create-gallery'
            focus='create-gallery-name' 
            title='Create Gallery' 
            type='Create'>
        </gallery-form>
        <!-- Edit Client Modal -->
        <gallery-form 
            :formData='editForm' 
            id='modal-edit-gallery'
            focus='edit-gallery-name'  
            title='Edit Gallery' 
            type='Update'>
        </gallery-form>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                galleries: [],

                createForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                },

                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            prepareComponent() {
                this.getGalleries();
            },

            /**
             * Get all of the OAuth clients for the user.
             */
            getGalleries() {
                this.$http.get('/api/gallery')
                    .then(response => {
                        this.galleries = response.data;
                    });
            },

            /**
             * Show the form for creating new clients.
             */
            showCreateClientForm() {
                $('#modal-create-gallery').modal('show');
            },

            /**
             * Create a new OAuth client for the user.
             */
            store(form) {
                this.persistClient(
                    'post', '/api/gallery/store',
                    form, '#modal-create-gallery'
                );
            },

            /**
             * Edit the given client.
             */
            edit(data) {
                this.editForm.id = data.gallery_id;
                this.editForm.name = data.gallery_name;
                this.editForm.redirect = data.gallery_url;

                $('#modal-edit-gallery').modal('show');
            },

            /**
             * Update the client being edited.
             */
            update(form) {
                this.persistClient(
                    'put', '/api/gallery/update/' + form.id,
                    form, '#modal-edit-gallery'
                );
            },

             /**
             * Persist the client to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                this.$http[method](uri, form)
                    .then(response => {
                        this.getGalleries();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(response => {
                        if (typeof response.data === 'object') {
                            form.errors = _.flatten(_.toArray(response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },

            destroy(gallery) {
                this.$http.delete('/api/gallery/destroy/' + gallery.gallery_id)
                    .then(response => {
                        this.getGalleries()
                    });
            },
        }
    }
</script>