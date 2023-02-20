import './bootstrap';

import { createApp } from "vue";
import router from "./router";
import app from './layouts/App.vue';
import store from './store/index.js'


createApp(app)
.use(router)
.use(store)
.mount('#app');