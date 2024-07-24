import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import vuetify from "./plugins/vuetify";
import i18n from "./plugins/i18n";
import FlagIcon from "vue-flag-icon";
import VueVideoPlayer from "vue-video-player";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import store from "./store";
import axios from "axios";

import "video.js/dist/video-js.css";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(FlagIcon);
Vue.config.productionTip = false;
Vue.use(VueVideoPlayer);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

axios.defaults.baseURL = process.env.VUE_APP_RUTA_API;

axios.interceptors.response.use(
  function (response) {
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
  function (error) {
    if (error) {
      const originalRequest = error.config;
      if (error.response.status === 400 && !originalRequest._retry) {
        originalRequest._retry = true;
        store.dispatch("UpdateErrorMessage", error.response.data.message);
        return Promise.reject(error);
      }
    }
  }
);

new Vue({
  router,
  store,
  vuetify,
  i18n,
  render: (h) => h(App),
}).$mount("#app");
