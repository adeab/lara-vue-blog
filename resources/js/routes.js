import VueRouter from 'vue-router'

import AdminHome from './components/admin/AdminHome.vue'
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'

// FrontEnd Component
import PublicHome from './components/public/PublicHome.vue'
import BlogPost from './components/public/blog/BlogPost.vue'
import SinglePost from './components/public/blog/SingleBlog.vue'
import CategoryBlogs from './components/public/blog/CategoryBlogs.vue'

// Post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'
let routes = [
    {
        path:'/admin/home',
        component:AdminHome
    },
    {
        path:'/admin/category-list',
        component:CategoryList
    },
    {
        path:'/admin/add-category',
        component:AddCategory
    },
    {
        path:'/admin/edit-category/:categoryid',
        component:EditCategory
    },
    // Post
    {
        path:'/admin/post-list',
        component:PostList
    },
    {
        path:'/admin/add-post',
        component:AddPost
    },
    {
        path:'/admin/edit-post/:postid',
        component:EditPost
    },

    // Frontend Route
    {
        path:'/',
        component:PublicHome
    },
    {
        path:'/blog',
        component:BlogPost
    },
    {
        path:'/rkapost',
        component:SinglePost
    },
    {
        path:'/categories/:id',
        component:CategoryBlogs
    },

];


const router = new VueRouter({
	routes,
    linkActiveClass: 'active',
    mode: 'history'
});

router.beforeEach((to, from, next) => {

    // if (to.matched.some(m => m.meta.requiresAuth)){
    //     return helper.check().then(response => {
    //         if(!response){
    //             return next({ path : '/login'})
    //         }

    //         return next()
    //     })
    // }

    // if (to.matched.some(m => m.meta.requiresGuest)){
    //     return helper.check().then(response => {
    //         if(response){
    //             return next({ path : '/'})
    //         }

    //         return next()
    //     })
    // }

    return next()
});

export default router;
