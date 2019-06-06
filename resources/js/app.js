import './bootstrap';
import '../../public/css/styles.css';
import Vue from 'vue';

window.Vue = Vue;
import Login from './views/login.vue';
import AdminPanel from './views/adminpanel.vue';
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    components: { login: Login, adminpanel: AdminPanel }
});
