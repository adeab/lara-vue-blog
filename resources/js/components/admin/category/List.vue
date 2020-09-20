<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Posts</h3>
            <button class="btn btn-primary" style="float: right;">
                <router-link to="/admin/add-category" style="color:#fff"> Add Category</router-link>
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Cover Image</th>
                        <th>Number of Posts</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category,index) in getallCategory" :key="category.id">

                        <td>{{index+1}}</td>
                        <td>{{category.name}}</td>
                        <td><img :src="ourImage(category.cover_image)" alt="" height="200"></td>
                        <td>Test</td>
                        <td>


                            <div>
                                <b-dropdown id="dropdown-right" right text="Action" variant="primary" class="m-2">
                                    <b-dropdown-item>
                                        <router-link :to="`/admin/edit-category/${category.id}`">Edit</router-link>
                                    </b-dropdown-item>
                                    <b-dropdown-item> <a href="" @click.prevent="deletecategory(category.id)">Delete</a>
                                    </b-dropdown-item>


                                </b-dropdown>
                            </div>

                        </td>
                    </tr>


                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Actions</th>
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
        data() {
            return {
                categoryItem: [],
                select: '',
                all_select: false
            }
        },
        mounted() {
            this.$store.dispatch("allCategory")
        },
        computed: {
            getallCategory() {
                return this.$store.getters.getCategory
            }
        },
        methods: {
            ourImage(img) {
                return "../categoryimage/" + img;
            },
            deletecategory(id) {
                axios.delete('/category/' + id)
                    .then(() => {
                        this.$store.dispatch("allCategory")
                        toast({
                            type: 'success',
                            title: 'Category Deleted successfully'
                        })
                    })
                    .catch(() => {

                    })
            },
            deleteSelected() {
                console.log(this.categoryItem)
                axios.get('/deletecategory/' + this.categoryItem)
                    .then(() => {
                        this.categoryItem = []
                        this.$store.dispatch("allCategory")
                        toast({
                            type: 'success',
                            title: 'Category Deleted successfully'
                        })

                    })
            },
            selectAll() {
                if (this.all_select == false) {
                    this.all_select = true
                    for (var category in this.getallCategory) {
                        this.categoryItem.push(this.getallCategory[category].id)
                    }
                } else {
                    this.all_select = false
                    this.categoryItem = []
                }


            }
        }
    }

</script>

<style scoped>
</style>
