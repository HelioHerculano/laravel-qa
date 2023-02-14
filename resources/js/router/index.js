import { createRouter, createWebHistory } from "vue-router";

import indexQuestionPage from '../pages/Questions/index.vue'
import notFound from '../pages/notFound.vue'


const routes = [

    {
        path:'/',
        name:'Questions',
        component: indexQuestionPage,
    },

    //notFound
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: notFound
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes,
})


export default router