import axios from "axios";

const state = {
  historicalMovements: null,
};

const getters = {
  StateHistoricalMovements: (state) => state.historicalMovements,
  StateHistoricalLoading: (state) => state.historicalLoading,
};

const actions = {
  async GetHistoricalMovements({ commit }, filtro) {
    let year = filtro.year;
    let month = filtro.month;
    commit("SetHistoricalLoading", true);
    let response = await axios.get(
      "getHistorical.php?y=" + year + "&m=" + month
    );
    await commit("SetHistoricalMovements", response.data);
    await commit("SetHistoricalLoading", false);
  },
  ResetState({ commit }) {
    commit("SetHistoricalLoading", false);
    commit("SetHistoricalMovements", null);
  },
};

const mutations = {
  SetHistoricalMovements(state, movements) {
    state.historicalMovements = movements;
  },
  SetHistoricalLoading(state, value) {
    console.log("Seteando loading");
    state.historicalLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
