import axios from "axios";

const state = {
  accessTypes: null,
  accessTypeLoading: false,
};

const getters = {
  StateAccessTypes: (state) => state.accessTypes,
  StateAccessTypeLoading: (state) => state.accessTypeLoading,
};

const actions = {
  async GetAccessTypes({ commit }) {
    commit("SetAccessTypeLoading", true);
    let response = await axios.get("accessTypes.php");
    await commit("SetAccessTypes", response.data);
    await commit("SetAccessTypeLoading", false);
  },
  ResetStateAccessTypes({ commit }) {
    commit("SetAccessTypes", null);
    commit("SetAccessTypeLoading", false);
  },
};

const mutations = {
  SetAccessTypes(state, l) {
    if (l != null) {
      l.map((lang) => {
        lang.name = "accessTypes." + lang.lang_key;
        return lang;
      });
    }
    state.accessTypes = l;
  },
  SetAccessTypeLoading(state, value) {
    state.accessTypeLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
