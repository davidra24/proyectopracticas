import './bootstrap';
import '../../public/css/styles.css';
import '../../public/css/loading.css';
import Vue from 'vue';

window.Vue = Vue;

import { library } from '@fortawesome/fontawesome-svg-core';
import { faEdit, faTrash, faCheck } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

import Login from './views/login.vue';
import AdminPanel from './views/adminpanel.vue';
import Estudiantes from './views/estudiantes.vue';
import Practicas from './views/practicas.vue';
import DocenteInfo from './components/docentes/docenteinfo.vue';
import DocenteForm from './components/docentes/docenteform.vue';
import BusInfo from './components/buses/businfo.vue';
import BusForm from './components/buses/busform.vue';
import Loading from './components/loading/loading.vue';
import Docentes from './views/docentes.vue';
import Buses from './views/buses.vue';
import UserPanel from './views/userpanel';
import Reportes from './views/reportes';
import router from './routes';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);
library.add(faEdit, faTrash, faCheck);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('DocenteInfo', DocenteInfo);
Vue.component('DocenteForm', DocenteForm);
Vue.component('BusInfo', BusInfo);
Vue.component('Loading', Loading);
Vue.component('BusForm', BusForm);

const app = new Vue({
    el: '#app',
    router,
    components: {
        login: Login,
        adminpanel: AdminPanel,
        practicas: Practicas,
        estudiantes: Estudiantes,
        docenteinfo: DocenteInfo,
        docenteform: DocenteForm,
        businfo: BusInfo,
        busform: BusForm,
        docentes: Docentes,
        loading: Loading,
        buses: Buses,
        userpanel: UserPanel,
        reportes: Reportes
    }
});
