import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import i18n from "./plugins/i18n";
import MdiSvg from "@yeliulee/vue-mdi-svg/v2";
import FlagIcon from "vue-flag-icon";
import VueFormulate from "@braid/vue-formulate";
import { es, en, pt } from "@braid/vue-formulate-i18n";

Vue.use(MdiSvg);
Vue.use(FlagIcon);
Vue.use(VueFormulate, {
  plugins: [es, en, pt],
});

axios.defaults.baseURL = process.env.VUE_APP_RUTA_API;

axios.interceptors.response.use(
  function(response) {
    if (response) {
      store.dispatch("UpdateErrorMessage", "");
      if (response.data.message) {
        store.dispatch("UpdateSuccessMessage", response.data.message);
      } else {
        store.dispatch("UpdateSuccessMessage", "");
      }
      return Promise.resolve(response);
    }
  },
  function(error) {
    if (error) {
      const originalRequest = error.config;
      if (error.response.status === 401 && !originalRequest._retry) {
        originalRequest._retry = true;
        store.dispatch("LogOut");
        return router.push("/login");
      }
      if (error.response.status === 405 && !originalRequest._retry) {
        originalRequest._retry = true;
        store.dispatch("LogOut");
        store.dispatch("UpdateErrorMessage", error.response.data.message);
        router.push("/restrictedAccess");
        return Promise.reject(error);
      }
      if (error.response.status === 400 && !originalRequest._retry) {
        originalRequest._retry = true;
        store.dispatch("UpdateErrorMessage", error.response.data.message);
        return Promise.reject(error);
      }
    }
  }
);

Vue.config.productionTip = false;

new Vue({
  store,
  router,
  i18n,
  render: (h) => h(App),
}).$mount("#app");
