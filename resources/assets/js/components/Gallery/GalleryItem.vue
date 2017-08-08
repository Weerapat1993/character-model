<style scoped>

</style>

<template>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        {{ gallery.gallery_name }}
                    </span>
                    <span>
                        <a :href="gallery.gallery_url" download class="btn btn-xs btn-success">
                            <i class="fa fa-download"></i> 
                        </a>
                        <a class="btn btn-xs btn-warning" @click="callEdit(gallery)">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" @click="callDestroy(gallery)">
                            <i class="fa fa-trash"></i>
                        </a>
                    </span>
                </div>
            </div>
            <img :src="gallery.gallery_url" class="img-responsive" align="center">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['gallery'],
        methods: {
            callDestroy(gallery) {
                this.$parent.destroy(gallery)
            },

            callEdit(gallery) {
                this.$parent.edit(gallery)
            }
        }
    }
</script>
