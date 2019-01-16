/**
 * Application Store
 */
// Libraries
import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import VueAxios from 'vue-axios';

// Modules
import users from './modules/users';

Vue.use(Vuex);
Vue.use(VueAxios, axios);

export const store = new Vuex.Store({

    modules: {
        users,
    },
    
    state: {

    },

    getters: {

    },

    mutations: {

    },
    
    actions: {

    }

})