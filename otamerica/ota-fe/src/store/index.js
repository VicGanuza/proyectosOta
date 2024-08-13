import { createStore } from "vuex";
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

export default createStore({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
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
});
