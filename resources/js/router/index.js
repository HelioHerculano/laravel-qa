import { createRouter, createWebHistory } from "vue-router";

import indexQuestionPage from '../pages/Questions/index.vue'
import notFound from '../pages/notFound.vue'

import questionCreate from '../pages/Questions/create.vue'

//auth
import login from '../pages/auth/login.vue'
import register from '../pages/auth/register.vue'

import store from '../store/index.js'


const routes = [

    {
        path:'/',
        name:'Questions',
        component: indexQuestionPage,
        meta:{
            requiresAuth:false
        }
    },

    {
        path:'/register',
        name:'Register',
        component: register,
        meta:{
            requiresAuth:false
        }
    },

    {
        path:'/login',
        name:'Login',
        component:login,
        meta:{
            requiresAuth:false
        }
    },
    {
        path:'/question/create',
        name:'questionCreate',
        component:questionCreate,
        meta:{
            requiresAuth:true
        }
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
});

router.beforeEach((to,from) =>{
    if(to.meta.requiresAuth && store.getters.getToken == 0){
        return { name: 'Login' }
    }
    /*if(to.meta.requiresAuth == false && store.getters.getToken != 0){
        return { name: 'Dashboard' }
    }*/
});


export default router