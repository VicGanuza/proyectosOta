import axios from "axios";

const state = {
  publicAccess: null,
  publicAccessList: null,
  publicAccessLoading: null,
};

const getters = {
  StatePublicAccess: (state) => state.publicAccess,
  StatePublicAccessList: (state) => state.publicAccessList,
  StatePublicAccessLoading: (state) => state.publicAccessLoading,
};

const actions = {
  async GetPublicAccess({ commit }, id) {
    commit("SetPublicAccessLoading", true);
    let response = await axios.get("publicAccess/get.php", {
      params: { id: id },
    });
    await commit("SetPublicAccess", response.data);
    await commit("SetPublicAccessLoading", false);
  },
  async GetPublicAccessList({ commit }) {
    commit("SetPublicAccessLoading", true);
    let response = await axios.get("publicAccess/get.php");
    await commit("SetPublicAccessList", response.data);
    await commit("SetPublicAccessLoading", false);
  },
  async CreatePublicAccess({ commit }, publicAccess) {
    const Data = new FormData();
    Data.append("name", publicAccess.name);
    Data.append("file", publicAccess.file);

    await axios.post("publicAccess/create.php", Data);
    await commit("SetPublicAccess", publicAccess);
  },
  async EditPublicAccess({ commit }, publicAccess) {
    const Data = new FormData();
    Data.append("id", publicAccess.id);
    Data.append("name", publicAccess.name);
    Data.append("file", publicAccess.file);

    await axios.post("publicAccess/edit.php", Data);
    await commit("SetPublicAccess", publicAccess);
  },
};

const mutations = {
  SetPublicAccess(state, cert) {
    state.publicAccess = cert;
  },
  SetPublicAccessList(state, list) {
    state.publicAccessList = list;
  },
  SetPublicAccessLoading(state, value) {
    state.publicAccessLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
