import axios from "axios";

const state = {
  officeList: null,
  officeLoading: null,
};

const getters = {
  StateOfficeList: (state) => state.officeList,
  StateOfficeLoading: (state) => state.officeLoading,
};

const actions = {
  async GetOfficeList({ commit }, user) {
    commit("SetOfficeLoading", true);
    let response = await axios.get("offices/get.php", {
      params: { user: user },
    });
    await commit("SetOfficeList", response.data);
    await commit("SetOfficeLoading", false);
  },
};

const mutations = {
  SetOfficeList(state, list) {
    list.map((of) => {
      of.companyTerminal = "offices." + of.terminal;
      return of;
    });
    state.officeList = list;
  },
  SetOfficeLoading(state, value) {
    state.officeLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
