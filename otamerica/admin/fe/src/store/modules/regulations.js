import axios from "axios";

const state = {
  regulation: {
    name: "",
    url: "",
  },
  regulationList: null,
};

const getters = {
  StateRegulation: (state) => state.regulation,
  StateRegulationList: (state) => state.regulationList,
};

const actions = {
  async CreateRegulation({ commit }, regulation) {
    const Data = new FormData();
    Data.append("name", regulation.name);
    Data.append("file", regulation.file);

    await axios.post("regulations/create.php", Data);
    await commit("SetRegulation", regulation);
  },
  async GetRegulation({ commit }, data) {
    if (data.id != 0) {
      let res = await axios.get("regulations/get.php", { params: data });
      await commit("SetRegulation", res.data);
    } else {
      await commit("SetRegulation", { name: "" });
    }
  },
  async EditRegulation({ commit }, regulation) {
    const Data = new FormData();
    Data.append("id", regulation.id);
    Data.append("name", regulation.name);
    if (regulation.file) Data.append("file", regulation.file);

    await axios.post("regulations/edit.php", Data);
    await commit("SetRegulation", regulation);
  },
  async GetRegulationList({ commit }, user) {
    let response = await axios.get("regulations/get.php", {
      params: { user: user },
    });
    await commit("SetRegulationList", response.data);
  },
};

const mutations = {
  SetRegulation(state, regulation) {
    state.regulation = regulation;
  },
  SetRegulationList(state, regulations) {
    state.regulationList = regulations;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
