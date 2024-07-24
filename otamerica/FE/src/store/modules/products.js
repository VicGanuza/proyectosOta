import axios from "axios";

const state = {
  products: null,
  productLoading: false,
};

const getters = {
  StateProducts: (state) => state.products,
  StateProductLoading: (state) => state.productLoading,
};

const actions = {
  async GetProducts({ commit }) {
    commit("SetProductLoading", true);
    let response = await axios.get("products.php");
    await commit("SetProducts", response.data);
    await commit("SetProductLoading", false);
  },
  ResetStateProducts({ commit }) {
    commit("SetProducts", null);
    commit("SetProductLoading", false);
  },
};

const mutations = {
  SetProducts(state, l) {
    if (l != null) {
      l.map((lang) => {
        lang.name = "products." + lang.lang_key;
        return lang;
      });
    }
    state.products = l;
  },
  SetProductLoading(state, value) {
    state.productLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
