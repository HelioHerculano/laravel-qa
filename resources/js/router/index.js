import { createRouter, createWebHistory } from "vue-router";

import indexQuestionPage from '../pages/Questions/index.vue'
import notFound from '../pages/notFound.vue'
//auth
import login from '../pages/auth/login.vue'
import register from '../pages/auth/register.vue'


const routes = [

    {
        path:'/',
        name:'Questions',
        component: indexQuestionPage,
    },

    {
        path:'/register',
        name:'Register',
        component: register
    },

    {
        path:'/login',
        name:'Login',
        component:login
    },

    //notFound
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: notFound,
        meta:{
            requiresAuth:false
        }
    }

]


const router = createRouter({
    history: createWebHistory(),
    routes,
})


export default router