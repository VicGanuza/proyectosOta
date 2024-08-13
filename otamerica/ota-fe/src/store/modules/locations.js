import axios from "axios";

const state = {
  locations: null,
  locationLoading: false,
};

const getters = {
  StateLocations: (state) => state.locations,
  StateLocationLoading: (state) => state.locationLoading,
};

const actions = {
  async GetLocations({ commit }) {
    commit("SetLocationLoading", true);
    let response = await axios.get("locations.php");
    await commit("SetLocations", response.data);
    await commit("SetLocationLoading", false);
  },
};

const mutations = {
  SetLocations(state, l) {
    l.map((lang) => {
      lang.name = "locations." + lang.lang_key;
      return lang;
    });
    state.locations = l;
  },
  SetLocationLoading(state, value) {
    state.locationLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
