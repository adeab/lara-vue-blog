<template>

    <!-- <div class="container"> -->

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()"> -->
        <form role="form" @submit.prevent="addCategory()" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Add New Category</label>
                                    <input type="text" class="form-control" id="categoryId" placeholder="Add New Category" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>
                                <div class="form-group">
                    <input @change="changePhoto($event)" name="photo" type="file"
                        :class="{ 'is-invalid': form.errors.has('photo') }">
                    <has-error :form="form" field="photo"></has-error>
                </div>

                            </div>
                            <!-- /.card-body -->
<div ref="imageCropperArea"></div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
        
    </div>

</template>
<script>
 import ImageCropper from './../../ImageCropper.vue';
export default {
    name: 'New',
    data(){
        return{
            form: new Form({
                name: '',
                temp_photo: '',
                    photo: '',
            })
        }
    },
    methods:{
         createImageCropping(event) {
                var ComponentClass = Vue.extend(ImageCropper)
                var instance = new ComponentClass({
                    propsData: {
                        imageSource: this.form.temp_photo
                    }
                })
                instance.$mount() // pass nothing
                this.$refs.imageCropperArea.appendChild(instance.$el)
                instance.$on('crop', dataUrl => {
                    this.form.photo = dataUrl;
                })

            },
             changePhoto(event) {
                let file = event.target.files[0];


                let reader = new FileReader();
                reader.onload = event => {
                    this.form.temp_photo = event.target.result
                    this.createImageCropping(event)

                };
                reader.readAsDataURL(file);


            },
            addCategory(){
                this.form.post('/add-category')
                    .then((response)=>{
                       this.$router.push('/admin/category-list')
                        toast({
                            type: 'success',
                            title: 'Category Added successfully'
                        })
                    })
                    .catch(()=>{

                    })

            }
    }

}
</script>