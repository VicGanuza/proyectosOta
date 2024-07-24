import Vuex from "vuex";
import Vue from "vue";
import createPersistedState from "vuex-persistedstate";
import auth from "./modules/auth";
import common from "./modules/common";
import historical from "./modules/historical";
import messages from "./modules/messages";
import user from "./modules/user";
import certificate from "./modules/certificates";
import documents from "./modules/documents";
import offices from "./modules/offices";
import publicAccess from "./modules/publicAccess";
import currentPolicies from "./modules/currentPolicies";
import regulation from "./modules/regulations";

// Load Vuex
Vue.use(Vuex);

// Create store
export default new Vuex.Store({
  modules: {
    auth,
    common,
    historical,
    messages,
    user,
    certificate,
    documents,
    offices,
    publicAccess,
    currentPolicies,
    regulation,
  },
  plugins: [createPersistedState()],
});
