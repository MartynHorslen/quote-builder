import * as VueRouter from 'vue-router';

export default {
    history: VueRouter.createWebHistory(),
    
    routes: [
        {
            path:'/',
            name:"Home",
            component:()=>import('@/components/Home.vue')
        }
        ,
        {
            path:'/about',
            name:"About",
            component:()=>import('@/components/About.vue')
        }
    ]
}
