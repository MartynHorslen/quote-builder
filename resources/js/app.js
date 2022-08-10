import './bootstrap';

import { createApp } from 'vue';
import * as VueRouter from "vue-router";
import routes  from './routes/routes';
import app from './App.vue';

const router = VueRouter.createRouter(routes);

const vueApp = createApp(app);

vueApp.use(router)

vueApp.mount('#app')