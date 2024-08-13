import axios from "axios";

const state = {
  businessAreas: null,
  businessAreaLoading: false,
};

const getters = {
  StateBusinessAreas: (state) => state.businessAreas,
  StateBusinessAreaLoading: (state) => state.businessAreaLoading,
};

const actions = {
  async GetBusinessAreas({ commit }) {
    commit("SetBusinessAreaLoading", true);
    let response = await axios.get("businessAreas.php");
    await commit("SetBusinessAreas", response.data);
    await commit("SetBusinessAreaLoading", false);
  },
  ResetStateBusinessArea({ commit }) {
    commit("SetBusinessAreas", null);
    commit("SetBusinessAreaLoading", false);
  },
};

const mutations = {
  SetBusinessAreas(state, l) {
    if (l != null) {
      l.map((lang) => {
        lang.name = "businessAreas." + lang.lang_key;
        return lang;
      });
    }
    state.businessAreas = l;
  },
  SetBusinessAreaLoading(state, value) {
    state.businessAreaLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
