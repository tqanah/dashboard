import Dashboard from "../components/Dashboard";
import BlogIndex from "../components/Blogs/Index.vue";
import BlogCreate from "../components/Blogs/Create.vue";

import CategoryIndex from "../components/Category/Index.vue";
import CategoryCreate from "../components/Category/Create.vue";
import CategoryEdit from "../components/Category/Edit.vue";


export default {
    mode:'history',
    routes:[
        {
            path:'/home',
            component:Dashboard,
            name:'dashboard'
        },
        {
            path:'/blog',
            component:BlogIndex,
            name:'blog.index'
        },
        {
            path:'/blog/create',
            component:BlogCreate,
            name:'blog.create'
        },
        {
            path:'/category',
            component:CategoryIndex,
            name:'category.index'
        },
        {
            path:'/category/create',
            component:CategoryCreate,
            name:'category.create'
        },
        {
            path:'/category/edit/:id',
            component:CategoryEdit,
            name:'category.edit'
        },

    ]
}

