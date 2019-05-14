import Vue from "vue";
import App from "./App.vue";
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

library.add(faCoffee )

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false;
Vue.use(BootstrapVue);

// VUE ROUTER
import VueRouter from "vue-router";
import { routes } from "./routes";
Vue.use(VueRouter);
const router = new VueRouter({
  routes,
  mode: "history"
});



new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
