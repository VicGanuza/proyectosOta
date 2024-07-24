import axios from "axios";

const state = {
  policy: {
    name: "",
    url: "",
  },
  policyList: null,
};

const getters = {
  StateCurrentPolicies: (state) => state.policy,
  StateCurrentPoliciesList: (state) => state.policyList,
};

const actions = {
  async CreateCurrentPolicy({ commit }, policy) {
    const Data = new FormData();
    Data.append("name", policy.name);
    Data.append("file", policy.file);

    await axios.post("currentPolicies/create.php", Data);
    await commit("SetCurrentPolicies", policy);
  },
  async GetCurrentPolicies({ commit }, data) {
    if (data.id != 0) {
      let res = await axios.get("currentPolicies/get.php", { params: data });
      await commit("SetCurrentPolicies", res.data);
    } else {
      await commit("SetCurrentPolicies", { name: "" });
    }
  },
  async EditCurrentPolicy({ commit }, policy) {
    const Data = new FormData();
    Data.append("id", policy.id);
    Data.append("name", policy.name);
    if (policy.file) Data.append("file", policy.file);

    await axios.post("currentPolicies/edit.php", Data);
    await commit("SetCurrentPolicies", policy);
  },
  async GetCurrentPoliciesList({ commit }, user) {
    let response = await axios.get("currentPolicies/get.php", {
      params: { user: user },
    });
    await commit("SetCurrentPoliciesList", response.data);
  },
};

const mutations = {
  SetCurrentPolicies(state, policy) {
    state.policy = policy;
  },
  SetCurrentPoliciesList(state, currentPolicies) {
    state.policyList = currentPolicies;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
