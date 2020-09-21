<template>

    <!-- <div class="container"> -->

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create New Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <!-- <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()"> -->
        <form role="form" enctype="multipart/form-data" @click="handleClick($event)"
            @submit.prevent="getButtonName($event)">
            <div class="card-body">
                <div class="form-group">
                    <label for="postId">Enter Title </label>
                    <input type="text" class="form-control" id="postId" placeholder="Title" v-model="form.title"
                        name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                    <label for="descriptionId">Add New Description</label>

                    <vue-editor v-model="form.body"></vue-editor>
                    <has-error :form="form" field="body"></has-error>
                </div>
                <div class="form-group">
                    <label for="author">Blog Created By </label>
                    <input type="text" class="form-control" id="author" placeholder="Author Name" v-model="form.author"
                        name="author" value="Softopark" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="author"></has-error>
                </div>

                <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }"
                        v-model="form.category_id">
                        <option disabled value="">Select One</option>
                        <option :value="category.id" v-for="(category,index) in getallCategory" :key="index">
                            {{category.name}}</option>

                    </select>
                    <has-error :form="form" field="category_id"></has-error>
                </div>
                <div class="form-group">

                    <label for="tags">Input Tags</label>
                    <b-form-tags input-id="tags" v-model="form.tags" name="tags"
                        :class="{ 'is-invalid': form.errors.has('tags') }" placeholder="Add Tag"></b-form-tags>
                    <has-error :form="form" field="tags"></has-error>

                </div>
                <div class="form-group">
                    <label>SEO Keywords </label>
                    <b-form-tags input-id="seo" v-model="form.seo" name="seo"
                        :class="{ 'is-invalid': form.errors.has('seo') }" placeholder="Add Keyword"></b-form-tags>
                    <has-error :form="form" field="seo"></has-error>
                </div>
                <div class="form-group">
                    <label>Blog URL</label>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">https://blogs.softopark.com/</span>
                        </div>
                        <input type="text" class="form-control" id="slug" placeholder="URL" v-model='getslug'
                            v-bind="form.slug" name="slug" :class="{ 'is-invalid': form.errors.has('slug') }"
                            aria-describedby="basic-addon3">
                    </div>

                    <has-error :form="form" field="slug"></has-error>
                </div>
                <div class="form-group">
                    <input @change="changePhoto($event)" name="photo" type="file"
                        :class="{ 'is-invalid': form.errors.has('photo') }">
                    <has-error :form="form" field="photo"></has-error>
                </div>


            </div>
            <div ref="imageCropperArea"></div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="publish" value="publish">Publish</button>
                <button type="submit" class="btn btn-success" name="draft" value="draft">Save as Draft</button>
            </div>
        </form>
        
    </div>

</template>




<script>
    import ImageCropper from './../../ImageCropper.vue';
    import { VueEditor } from "vue2-editor";
    
    export default {
        name: "New",
        data() {
            return {
                form: new Form({
                    title: '',
                    body: '',
                    category_id: '',
                    temp_photo: '',
                    photo: '',
                    seo: '',
                    slug: '',
                    tags: '',
                    author: 'Softopark',

                }),
                // test: '',

            }
        },
        
        components: {
            ImageCropper,
            VueEditor
        },
        mounted() {
            this.$store.dispatch("allCategory");

        },
        computed: {
            getallCategory() {
                return this.$store.getters.getCategory
            },
            getslug: function () {
                var slug = this.sanitizeTitle(this.form.title);
                return slug;
            },
            setslug: function () {
                this.form.slug = this.getslug;
            },

        },
        methods: {

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

            handleClick(e) {
                var buttonName = e.target.name;
                if (buttonName === "publish") {
                    this.addnewPost();
                } else {
                    this.addDraftPost();
                }

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
            addnewPost() {
                this.form.post('/savenewpost')
                    .then(() => {
                        toast({
                            type: 'success',
                            title: 'Post Added successfully'
                        })
                    })
                    .catch(() => {

                    })
            },
            addDraftPost() {
                this.form.post('/savedraft')
                    .then(() => {
                        toast({
                            type: 'success',
                            title: 'Draft Saved'
                        })
                    })
                    .catch(() => {

                    })
            },
            sanitizeTitle: function (title) {
                var slug = "";
                // Change to lower case
                var titleLower = title.toLowerCase();
                // Letter "e"
                slug = titleLower.replace(/e|é|è|ẽ|ẻ|ẹ|ê|ế|ề|ễ|ể|ệ/gi, 'e');
                // Letter "a"
                slug = slug.replace(/a|á|à|ã|ả|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ/gi, 'a');
                // Letter "o"
                slug = slug.replace(/o|ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ờ|ỡ|ở|ợ/gi, 'o');
                // Letter "u"
                slug = slug.replace(/u|ú|ù|ũ|ủ|ụ|ư|ứ|ừ|ữ|ử|ự/gi, 'u');
                // Letter "d"
                slug = slug.replace(/đ/gi, 'd');
                // Trim the last whitespace
                slug = slug.replace(/\s*$/g, '');
                // Change whitespace to "-"
                slug = slug.replace(/\s+/g, '-');

                return slug;
            }
        }

    }

</script>

<style scoped>

</style>
