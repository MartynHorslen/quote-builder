import * as VueRouter from 'vue-router';

export default {
    history: VueRouter.createWebHistory(),
    
    routes: [
        {
            path:'/',
            name:"Home",
            component:()=>import('@/views/Home.vue')
        }
        ,
        {
            path:'/about',
            name:"About",
            component:()=>import('@/views/About.vue')
        }
    ]
}
