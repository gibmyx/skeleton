import Vuex from 'vuex';
import Vue from 'vue';
Vue.use(Vuex);

import actions from './actions';
import getters from './getters';
import mutations from './mutations';


const store = new Vuex.Store({
    modules: {
    },
    state: {
        token: localStorage.getItem('access_token') || null,
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0,
        },
        offset: 1
    },
    mutations,
    getters,
    actions
});

export default store
