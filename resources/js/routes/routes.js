import * as VueRouter from 'vue-router';

export default {
    history: VueRouter.createWebHistory(),
    
    routes: [
        {
            path:'/',
            name:"Home",
            component:()=>import('@/views/Home.vue')
        },
        {
            path:'/products',
            name:"Products",
            component:()=>import('@/views/Products.vue')
        },
        {
            path:'/products/create',
            name:"Create a Product",
            component:()=>import('@/views/CreateProduct.vue')
        },
        {
            path:'/quotes',
            name:"Quotes",
            component:()=>import('@/views/Quotes.vue')
        }
    ]
}
