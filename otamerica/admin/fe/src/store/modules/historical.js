import axios from "axios";

const state = {
  historical: {
    year: "",
    name: "",
    month: 0,
    url: "",
  },
  historicalMovements: null,
};

const getters = {
  StateHistorical: (state) => state.historical,
  StateHistoricalMovements: (state) => state.historicalMovements,
};

const actions = {
  async CreateHistorical({ commit }, historical) {
    const Data = new FormData();
    Data.append("year", historical.year);
    Data.append("month", historical.month);
    Data.append("file", historical.file);
    Data.append("name", historical.name);

    await axios.post("historicalMovements/create.php", Data);
    await commit("SetHistorical", historical);
  },
  async GetHistorical({ commit }, id) {
    if (id != 0) {
      let res = await axios.get("historicalMovements/get.php?id=" + id);
      await commit("SetHistorical", res.data);
    } else {
      await commit("SetHistorical", { year: "", month: 0 });
    }
  },
  async EditHistorical({ commit }, historical) {
    const Data = new FormData();
    Data.append("id", historical.id);
    Data.append("year", historical.year);
    Data.append("month", historical.month);
    Data.append("file", historical.file);
    Data.append("name", historical.name);

    await axios.post("historicalMovements/edit.php", Data);
    await commit("SetHistorical", historical);
  },
  async GetHistoricalMovements({ commit }, filtro) {
    let year = filtro.year;
    let month = filtro.month;
    let response = await axios.get(
      "historicalMovements/get.php?y=" + year + "&m=" + month
    );
    await commit("SetHistoricalMovements", response.data);
  },
};

const mutations = {
  SetHistorical(state, historical) {
    state.historical = historical;
  },
  SetHistoricalMovements(state, movements) {
    state.historicalMovements = movements;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
