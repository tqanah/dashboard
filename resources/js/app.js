
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import CKEditor from '@ckeditor/ckeditor5-vue2';
import VueSweetalert2 from "vue-sweetalert2";
Vue.use(VueRouter)
Vue.use( CKEditor );
Vue.use( VueSweetalert2 );


Vue.prototype.$user = window.User

import routes from './routes'

import App from './components/App.vue'
import Sidebar from './components/sidebar.vue'

Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
    components:{
        App,Sidebar
    },
    router:new VueRouter(routes)
});
