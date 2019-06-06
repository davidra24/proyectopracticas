import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const NotFound = { template: '<p>Page not found</p>' };
export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'login',
            component: require('./views/login')
        },
        {
            path: '/admin',
            name: 'admin',
            component: require('./views/adminpanel')
        },
        {
            path: '*',
            name: 'not found',
            component: NotFound
        }
    ],
    mode: 'history'
});
