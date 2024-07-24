import axios from "axios";

const state = {
  userLogged: null,
  access: null,
};

const getters = {
  isAuthenticated: (state) => !!state.userLogged,
  StateUserLogged: (state) => state.userLogged,
  StateAccess: (state) => state.access,
};

const actions = {
  async LogIn({ commit }, user) {
    await axios.post("login.php", user);
    await commit("SetUserLogged", user.get("username"));
  },

  async GetAccess({ commit }, userId) {
    let response = await axios.get("access.php?user=" + userId);
    await commit("SetAccess", response.data);
  },

  async LogOut({ commit }) {
    let user = null;
    commit("Logout", user);
  },
};

const mutations = {
  SetUserLogged(state, username) {
    state.userLogged = username;
  },
  Logout(state, user) {
    state.userLogged = user;
  },
  SetAccess(state, access) {
    state.access = access;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
