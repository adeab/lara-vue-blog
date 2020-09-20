<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Posts</h3>
            <button class="btn btn-primary" style="float: right;">
                <router-link to="/admin/add-post" style="color:#fff"> Add New Post</router-link>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                       <th>Publishing Status</th>
                        <th>Featuring Status</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <!-- <th>Photo</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(post,index) in allpost" :key="index">
                        <td>{{index+1}}</td>
                        <td v-if="post.publish_status=='draft'">Draft</td>
                        <td v-else>Published</td>
                        <td v-if="post.featured==0">Not Featured</td>
                        <td v-else>Featured</td>
                        <td v-if="post.category">{{post.category.name}}</td>
                        <td>{{post.title | sortlength(20,"---")}}</td>
                        <td v-html="$options.filters.sortlength(post.body, 40, '....')"></td>
                        <!-- <td><img :src="ourImage(post.photo)" alt="" width="40" height="50"></td> -->
                        <td>
                            <div>
  <b-dropdown id="dropdown-right" right text="Action" variant="primary" class="m-2">
    <b-dropdown-item><router-link :to="`/admin/edit-post/${post.id}`">Edit</router-link></b-dropdown-item>
    <b-dropdown-item><a href="" @click.prevent="deletePost(post.id)">Delete</a></b-dropdown-item>
    <b-dropdown-item v-if="post.publish_status=='draft'"><a href="" @click.prevent="togglePublishStatus(post.id)">Publish Post</a></b-dropdown-item>
    <b-dropdown-item v-else><a href="" @click.prevent="togglePublishStatus(post.id)">Make Draft</a></b-dropdown-item>
    <b-dropdown-item v-if="post.featured==0"><a href="" @click.prevent="toggleFeaturedStatus(post.id)">Mark As Featured</a></b-dropdown-item>
    <b-dropdown-item v-else><a href="" @click.prevent="toggleFeaturedStatus(post.id)">Mark As Not-Featured</a></b-dropdown-item>
    
  </b-dropdown>
</div>
                            <!-- 
                             -->

                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Publishing Status</th>
                        <th>Featuring Status</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <!-- <th>Photo</th> -->
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>






    <!-- /.content -->

</template>

<script>
    export default {
        name: "List",
        data(){
            return{
                trimmed_body: '',
            }
            
        },
        mounted() {
            this.$store.dispatch('gelAllPost')
        },
        computed: {
            allpost() {
                return this.$store.getters.getAllPost
            }
        },
        methods: {
            ourImage(img) {
                return "../uploadimage/" + img;
            },
            deletePost(id) {
                axios.delete('/delete/' + id)
                    .then(() => {
                        this.$store.dispatch('gelAllPost')
                        toast({
                            type: 'success',
                            title: 'Post Deleted successfully'
                        })
                    })
                    .catch(() => {

                    })
            },
            togglePublishStatus(id) {
                axios.post('/toggleStatus/' + id)
                    .then(() => {
                        this.$store.dispatch('gelAllPost')
                        toast({
                            type: 'success',
                            title: 'Post Deleted successfully'
                        })
                    })
                    .catch(() => {

                    })
            },
            toggleFeaturedStatus(id) {
                axios.post('/toggleFeatured/' + id)
                    .then(() => {
                        this.$store.dispatch('gelAllPost')
                        toast({
                            type: 'success',
                            title: 'Post Deleted successfully'
                        })
                    })
                    .catch(() => {

                    })
            }

        }
    }

</script>

<style scoped>

</style>
