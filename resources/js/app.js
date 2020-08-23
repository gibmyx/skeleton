import {mapGetters} from "vuex";

require('./bootstrap');

import router from './routes';
import store from './stores';
import CxltToastr from 'cxlt-vue2-toastr';
import VueResource from 'vue-resource';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import Vuelidate from 'vuelidate';
import VueNumeric from 'vue-numeric';
import Select2 from 'v-select2-component';

window.Vue = require('vue');
window.tkn = document.head.querySelector('meta[name="csrf-token"]').content;

//importacion de estilos
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';


const toastrConfigs = {
    position: 'top right',
    showDuration: 2000,
    timeOut: 5000,
    progressBar: true,
    successColor: 'green',
    infoColor: 'blue',
    warningColor: 'orange',
    errorColor: 'red',
};

Vue.use(CxltToastr, toastrConfigs);
Vue.use(VueResource);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Vuelidate);
Vue.use(VueNumeric);

Vue.component('select2', Select2);
Vue.component('app', require('./pages/App.vue').default);
Vue.component('home', require('./pages/Home.vue').default);
Vue.component('sidebar', require('./componentes/sidebar.vue').default);
Vue.component('navbar', require('./componentes/navbar.vue').default);

// Vue.http.interceptors.push((request, next) => {
//     request.headers.set('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);
//     next();
// });

const app = new Vue({
    el: '#app',
    router,
    store,
    data: {
    },
    computed: {
        ...mapGetters(['loggedIn'])
    }
});
