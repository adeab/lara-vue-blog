<template>
    <div class="">
        <img ref="image" :src="imageSource">
    </div>

</template>
<script>
    import Cropper from 'cropperjs';
    export default {
        name: 'ImageCropper',
        props: {
            imageSource: String,
        },
        data() {
            return {
                cropper: {},
                destination: {},
                image: {},
            }
        },
        mounted() {
            this.image = this.$refs.image;
            this.cropper = new Cropper(this.image, {
                zoomable: false,
                scalable: false,
                aspectRatio: 1,

            });
        }


    }

</script>
