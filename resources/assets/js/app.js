
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from "vue-router";
Vue.use(VueRouter);
import { Form, HasError, AlertError } from 'vform';
Vue.component('spinner' , require('vue-simple-spinner'));
import App from "./App.vue";
window.Form = Form;
import router from './router/index';

new Vue({
    router,

    render: h => h(App)
}).$mount('#app');
