import Vuex from "vuex";
import Vue from "vue";
import createPersistedState from "vuex-persistedstate";
import locations from "./modules/locations";
import common from "./modules/common";
import historical from "./modules/historical";
import messages from "./modules/messages";
import terminal from "./modules/terminal";
import businessAreas from "./modules/businessAreas";
import products from "./modules/products";
import accessTypes from "./modules/accessTypes";
import documents from "./modules/documents";
import news from "./modules/news";

// Load Vuex
Vue.use(Vuex);

// Create store
export default new Vuex.Store({
  modules: {
    locations,
    common,
    historical,
    messages,
    businessAreas,
    terminal,
    products,
    accessTypes,
    documents,
    news,
  },
  plugins: [createPersistedState()],
});
