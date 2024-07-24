const state = {
  errorMessage: "",
  successMessage: "",
  showError: false,
  showSuccess: false,
};

const getters = {
  StateErrorMessage: (state) => state.errorMessage,
  StateShowError: (state) => state.showError,
  StateSuccessMessage: (state) => state.successMessage,
  StateShowSuccess: (state) => state.showSuccess,
};

const actions = {
  UpdateErrorMessage({ commit }, mes) {
    commit("SetErrorMessage", mes);
    commit("SetShowError", mes);
  },
  UpdateSuccessMessage({ commit }, mes) {
    commit("SetSuccessMessage", mes);
    commit("SetShowSuccess", mes);
  },
};

const mutations = {
  SetErrorMessage(state, errorMessage) {
    state.errorMessage = errorMessage;
  },
  SetShowError(state, errorMessage) {
    state.showError = errorMessage != "" ? true : false;
  },
  SetSuccessMessage(state, successMessage) {
    state.successMessage = successMessage;
  },
  SetShowSuccess(state, successMessage) {
    state.showSuccess = successMessage != "" ? true : false;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
