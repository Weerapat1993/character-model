<template>
    <!-- Create Client Modal -->
    <div class="modal fade" :id="id" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        {{ title }}
                    </h4>
                </div>

                <div class="modal-body">
                    <!-- Form Errors -->
                    <div class="alert alert-danger" v-if="form.errors.length > 0">
                        <p><strong>Whoops!</strong> Something went wrong!</p>
                        <br>
                        <ul>
                            <li v-for="error in form.errors">
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <!-- Create Client Form -->
                    <form class="form-horizontal" role="form">
                        <!-- Name -->
                        <gallery-input 
                            label="Name" 
                            info="Something your users will recognize and trust.">
                            <input :id="focus" type="text" class="form-control" @keyup.enter="enter" v-model="form.name">
                        </gallery-input>

                        <!-- Redirect URL -->
                        <gallery-input 
                            label="Redirect URL" 
                            info="Your application's authorization callback URL.">
                            <input type="text" class="form-control" @keyup.enter="enter" v-model="form.redirect">
                        </gallery-input>
                    </form>

                    <pre>{{ form || json }}</pre>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="enter">
                        {{ type }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['formData','id','title','type','focus'],
        mounted() {
            $(`#${this.id}`).on('shown.bs.modal', () => {
                $(`#${this.focus}`).focus();
            });
        },
        data() {
            return {
                form: this.formData
            }
        },

        methods: {
            enter() {
                if(this.type === 'Create') {
                    this.create()
                } else if(this.type === 'Update') {
                    this.update()
                }
            },
            update() {
                this.$parent.update(this.form)
            },
            create() {
                this.$parent.store(this.form)
            },
        }
    }
</script>