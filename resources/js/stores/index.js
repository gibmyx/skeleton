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
        token: localStorage.getItem('access_token') || null
    },
    mutations,
    getters,
    actions
});

export default store
