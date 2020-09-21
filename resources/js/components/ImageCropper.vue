<template>

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Crop Image</h3>
        </div>
        <div class="card-body row">
            <div class="col-lg-7">
                <img ref="image" :src="imageSource" style="width: 100%;">
            </div>
            <div class="col-lg-5" style="padding: 30px;">

                <div style="height: 216px; width: 384px;" class="position-relative">
                    <img ref="destinationImage" :src="destination" class="img-fluid">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success">
                            Preview
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->


</template>
<script>
    import Cropper from 'cropperjs';
    export default {
        name: 'ImageCropper',
        props: {
            imageSource: String,
            // customFun: Function,
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
                aspectRatio: 16 / 9,
                viewMode: 1,
                background: false,
                crop: () => {
                    const canvas = this.cropper.getCroppedCanvas();
                    this.destination = canvas.toDataURL("image/png");
                    // this.setDestinationImage(this.destination);
                    // this.customFun(this.destination);
                    this.$emit('crop', canvas.toDataURL('image/png'))
                    
                },

            });
            // this.$store.commit("changeImageCropped", this.destination);
            
        },
        



    }

</script>
