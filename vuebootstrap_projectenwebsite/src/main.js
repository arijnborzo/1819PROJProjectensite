import Vue from "vue";
import App from "./App.vue";

// BOOTSTRAP VUE
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
Vue.use(BootstrapVue);

// VUE ROUTER
import VueRouter from "vue-router";
import { routes } from "./routes";
Vue.use(VueRouter);
const router = new VueRouter({
  routes,
  mode: "history"
});

Vue.config.productionTip = false;

new Vue({
  router,
  render: h => h(App)
}).$mount("#app");
