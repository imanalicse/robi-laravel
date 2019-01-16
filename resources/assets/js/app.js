
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import axios from 'axios';
import VueAxios from 'vue-axios';
import { store } from './store/index';


Vue.use(ElementUI);
Vue.use(VueAxios, axios);

Vue.component('dashboard', require('./components/admin/Dashboard.vue'));
Vue.component('admin-top-menu', require('./components/admin/common/TopMenu.vue'));
Vue.component('admin-aside-menu', require('./components/admin/common/AsideMenu.vue'));
Vue.component('admin-footer', require('./components/admin/common/Footer.vue'));
Vue.component('movies', require('./components/admin/movies/Movies.vue'));

// User Components
Vue.component('users', require('./components/admin/users/Users.vue'));
Vue.component('user-list', require('./components/admin/users/List.vue'));
Vue.component('add-user', require('./components/admin/users/Add.vue'));
Vue.component('edit-user', require('./components/admin/users/Edit.vue'));

const app = new Vue({
    store: store,
    el: '#app'
});
