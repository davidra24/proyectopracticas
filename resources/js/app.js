import './bootstrap';
import '../../public/css/styles.css';
import '../../public/css/loading.css';
import '../../public/css/miniloading.css';
import Vue from 'vue';

window.Vue = Vue;

import { library } from '@fortawesome/fontawesome-svg-core';
import {
    faEdit,
    faTrash,
    faCheck,
    faDatabase
} from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import Datepicker from 'vuejs-datepicker';

import Login from './views/login.vue';
import AdminPanel from './views/adminpanel.vue';
import Estudiantes from './views/estudiantes.vue';
import Practicas from './views/practicas.vue';
import ManagePracticesForm from './components/managepractices/maganepracticesform.vue';
import ManagePracticesInfo from './components/managepractices/managepracticesinfo';
import Practica from './views/practica.vue';
import DocenteInfo from './components/docentes/docenteinfo.vue';
import DocenteForm from './components/docentes/docenteform.vue';
import BusInfo from './components/buses/businfo.vue';
import BusForm from './components/buses/busform.vue';
import EstudianteInfo from './components/estudiantes/estudianteinfo.vue';
import EstudianteForm from './components/estudiantes/estudianteform.vue';
import PracticaInfo from './components/practicas/practicasinfo.vue';
import PracticaForm from './components/practicas/practicasform.vue';
import Loading from './components/loading/loading.vue';
import MiniLoading from './components/loading/miniloading.vue';
import Docentes from './views/docentes.vue';
import Buses from './views/buses.vue';
import UserPanel from './views/userpanel';
import Reportes from './views/reportes';
import Reporte from './views/reporte';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);
library.add(faEdit, faTrash, faCheck, faDatabase);
Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('datepicker', Datepicker);
Vue.component('DocenteInfo', DocenteInfo);
Vue.component('DocenteForm', DocenteForm);
Vue.component('BusInfo', BusInfo);
Vue.component('BusForm', BusForm);
Vue.component('EstudianteInfo', EstudianteInfo);
Vue.component('EstudianteForm', EstudianteForm);
Vue.component('PracticaInfo', PracticaInfo);
Vue.component('PracticaForm', PracticaForm);
Vue.component('ManagePracticesInfo', ManagePracticesInfo);
Vue.component('ManagePracticesForm', ManagePracticesForm);
Vue.component('Loading', Loading);
Vue.component('MiniLoading', MiniLoading);

const app = new Vue({
    el: '#app',
    components: {
        login: Login,
        datepicker: Datepicker,
        adminpanel: AdminPanel,
        practicas: Practicas,
        practica: Practica,
        estudiantes: Estudiantes,
        docenteinfo: DocenteInfo,
        docenteform: DocenteForm,
        businfo: BusInfo,
        busform: BusForm,
        estudianteinfo: EstudianteInfo,
        estudianteform: EstudianteForm,
        managepracticesinfo: ManagePracticesInfo,
        managepracticesform: ManagePracticesForm,
        practicainfo: PracticaInfo,
        practicaform: PracticaForm,
        docentes: Docentes,
        loading: Loading,
        miniloading: MiniLoading,
        buses: Buses,
        userpanel: UserPanel,
        reportes: Reportes, 
        reporte: Reporte 
    }
});
