
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap.js');

// window.Vue = require('vue/types');
import Vue from 'vue';
import App from './App.vue';
import '@fortawesome/fontawesome-free/css/all.css'
import Vuetify from 'vuetify'
Vue.use(Vuetify, {
    iconfont: 'fa'
})
// BOOTSTRAP VUE
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCoffee  } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(FlashMessage);
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

// VUE ROUTER
import VueRouter from "vue-router";
import { routes } from "./routes";
Vue.use(VueRouter);
const router = new VueRouter({
    routes,
    mode: "history"
});

library.add(faCoffee )

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false;
Vue.use(BootstrapVue);
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
//used
Vue.component('registreerForm_vue', require('./components/Registreer/RegistreerForm.vue'));
Vue.component('registreren_vue', require('./components/Registreer/Registreren.vue'));
Vue.component('paswoordVergeten_vue', require('./components/PaswoordVergeten/PaswoordVergeten.vue'));
Vue.component('PWVForm_vue', require('./components/PaswoordVergeten/PWVForm.vue'));
Vue.component('filter_vue', require('./components/Overzicht/Filter.vue'));
//used
Vue.component('overzicht_vue', require('./components/Overzicht/Overzicht.vue'));
//used
Vue.component('project_vue', require('./components/Overzicht/Project.vue'));
//used
Vue.component('nieuwProject_vue', require('./components/NieuwProject/NieuwProject.vue'));
Vue.component('login_vue', require('./components/Login/Login.vue'));
//used
Vue.component('loginForm_vue', require('./components/Login/LoginForm.vue'));
//used
Vue.component('footer_vue', require('./components/HeaderFooter/Footer.vue'));
//used
Vue.component('header_vue', require('./components/HeaderFooter/Header.vue'));
//used
Vue.component('belbintest_vue', require('./components/Belbintest/Belbintest.vue'));
//used
Vue.component('archief_vue', require('./components/Archief/Archief.vue'));
//used
Vue.component('newproject_vue', require('./components/NieuwProject/NieuwProject.vue'));
//used
Vue.component('details_vue', require('./components/MijnProject/DetailProject'));
//used
Vue.component('mijnproject_vue', require('./components/MijnProject/MijnProject'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import studenten_vue from './components/Studenten/Studenten'
import footer_vue from './components/HeaderFooter/Footer'
import header_vue from './components/HeaderFooter/Header'
import overzicht_vue from './components/Overzicht/Overzicht'
import project_vue from './components/Overzicht/Project'
import filter_vue from './components/Overzicht/Filter'
import loginForm_vue from './components/Login/LoginForm'
import login_vue from './components/Login/Login'
import newproject_vue from './components/NieuwProject/NieuwProject'
import belbin_vue from './components/Belbintest/Belbintest'
import archief_vue from './components/Archief/Archief'
import mijnproject_vue from './components/MijnProject/MijnProject'
import details_vue from './components/MijnProject/DetailProject'
window.onload = function () {
    const app = new Vue({
        router,
        el: '#app',
        components: {studenten_vue, footer_vue, header_vue, overzicht_vue, project_vue, filter_vue, newproject_vue, login_vue, loginForm_vue, belbin_vue, archief_vue, details_vue, mijnproject_vue
        }
    });
}
