require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import Vue from "vue";
Vue.component('app', require('./components/App').default)
const app = new Vue({
    el: '#app',
});
