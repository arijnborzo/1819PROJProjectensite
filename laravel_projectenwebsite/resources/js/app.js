
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap.js');

// window.Vue = require('vue/types');
import Vue from 'vue';
// BOOTSTRAP VUE
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import App from './components/App.vue';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('studenten_vue', require('./components/Studenten/Studenten.vue'));
//Vue.component('registreerForm_vue', require('./components/Registreer/RegistreerForm.vue'));
//Vue.component('registreren_vue', require('./components/Registreer/Registreren.vue'));
Vue.component('paswoordVergeten_vue', require('./components/PaswoordVergeten/PaswoordVergeten.vue'));
Vue.component('PWVForm_vue', require('./components/PaswoordVergeten/PWVForm.vue'));
Vue.component('filter_vue', require('./components/Overzicht/Filter.vue'));
Vue.component('overzicht_vue', require('./components/Overzicht/Overzicht.vue'));
Vue.component('project_vue', require('./components/Overzicht/Project.vue'));
Vue.component('nieuwProject_vue', require('./components/NieuwProject/NieuwProject.vue'));
Vue.component('login_vue', require('./components/Login/Login.vue'));
Vue.component('loginForm_vue', require('./components/Login/LoginForm.vue'));
Vue.component('footer_vue', require('./components/HeaderFooter/Footer.vue'));
Vue.component('header_vue', require('./components/HeaderFooter/Header.vue'));
Vue.component('belbintest_vue', require('./components/Belbintest/Belbintest.vue'));
Vue.component('archief_vue', require('./components/Archief/Archief.vue'));





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import studenten_vue from './components/Studenten/Studenten';
window.onload = function () {
    const app = new Vue({
        el: '#app',
        components: {studenten_vue}
    });
}