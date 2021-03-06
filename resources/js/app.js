require('./bootstrap');

window.Vue = require('vue');

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import "@fortawesome/fontawesome-free/css/fontawesome.css";
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/css/brands.css";
import "@fortawesome/fontawesome-free/css/regular.css";
import "@fortawesome/fontawesome-free/css/solid.css";
import 'v-markdown-editor/dist/v-markdown-editor.css';
import 'bootstrap-vue/dist/bootstrap-vue.css'
// import 'mdbvue/lib/css/mdb.min.css';
import Editor from 'v-markdown-editor'

Vue.use(Editor);
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import store from './store';
import router from './routes'


import Vuex from 'vuex'
Vue.use(Vuex)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {filter} from './filter'

import CategorySlider from './components/public/blog/CategorySlider.vue';
import FeaturedSlider from './components/public/blog/FeaturedSlider.vue';
import BlogSidebar from './components/public/blog/BlogSidebar.vue';
import BlogSearchbar from './components/public/blog/BlogSearchbar.vue';
import BlogPost from './components/public/blog/BlogPost.vue';

Vue.component('category-slider', CategorySlider);
Vue.component('featured-slider', FeaturedSlider);
Vue.component('blog-sidebar', BlogSidebar);
Vue.component('blog-searchbar', BlogSearchbar);
Vue.component('all-blogs', BlogPost);

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('dashboard', require('./components/admin/AdminHome.vue'));
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);

import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;
// Sweet alert 2
import swal from 'sweetalert2'
window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast

const app = new Vue({
    el: '#app',
    store,
    router
});
