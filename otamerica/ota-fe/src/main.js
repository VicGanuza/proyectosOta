import { createApp } from "vue";
//import Vue from "vue";
// Vuetify
import "vuetify/styles";
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import App from "./App.vue";
import router from "./router";
//import { Flag } from "vue-flag-icon/components";
import FlagIcon from "vue-flag-icon";
import i18n from "./plugins/i18n";
import store from "./store";
import axios from "axios";

const vuetify = createVuetify({ components, directives });
//Vue.config.productionTip = false;

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

const app = createApp(App);

app.config.globalProperties.$filters = {
  dateFormat(value) {
    if (value) {
      return value.year + "-" + value.month;
    }
    return "";
  },
};

app.use(store).use(router).use(vuetify).use(FlagIcon).use(i18n).mount("#app");
