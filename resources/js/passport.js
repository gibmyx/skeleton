require('./bootstrap');

import Vue from 'vue';
import passportClients from './components/passport/Clients.vue';
import passportAuthorizedClients from './components/passport/AuthorizedClients.vue';
import passportPersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';

window.Vue = require('vue');
window.tkn = document.head.querySelector('meta[name="csrf-token"]').content;
window.$ = window.jQuery = require('jquery');


const app = new Vue({
    el: '#passport',
    data: {
    },
    computed: {
    },
    components: {
        passportClients,
        passportAuthorizedClients,
        passportPersonalAccessTokens
    }

});
