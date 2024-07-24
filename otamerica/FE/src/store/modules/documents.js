import axios from "axios";

const state = {
  publicAccessDocument: null,
  publicAccessDocumentLoading: false,
  anpDocument: null,
  anpDocumentLoading: false,
  currentPolicies: null,
  regulations: null,
  currentPoliciesLoading: false,
  regulationsLoading: false,
  requestAnsw: null,
  approveAnsw: null,
  downloadAnsw: null,
  pliegos: [
    {
      id: 0,
      name: "Bases de la Convocatoria para la Contratación de Almacenaje  y Despacho a Buques Tanque  en Firme en la Terminal Puerto Rosales",
      fileName: "pliego1.pdf",
      terminal: "puertoRosales",
    },
  ],
  pliego: null,
};

const getters = {
  StatePublicAccessDocuments: (state) => state.publicAccessDocument,
  StatePublicAccessDocumentLoading: (state) =>
    state.publicAccessDocumentLoading,
  StateAnpDocuments: (state) => state.anpDocument,
  StateAnpDocumentLoading: (state) => state.anpDocumentLoading,
  StateCurrentPolicies: (state) => state.currentPolicies,
  StateCurrentPoliciesLoading: (state) => state.currentPoliciesLoading,
  StateRegulations: (state) => state.regulations,
  StateRegulationsLoading: (state) => state.regulationsLoading,
  StatePliegos: (state) => state.pliegos,
  StatePliego: (state) => state.pliego,
  StateRequestAnsw: (state) => state.requestAnsw,
  StateApproveAnsw: (state) => state.approveAnsw,
  StateDownloadAnsw: (state) => state.downloadAnsw,
};

const actions = {
  async GetPublicAccessDocuments({ commit }) {
    commit("SetPublicAccessDocumentLoading", true);
    let response = await axios.get("politicsDocuments.php");
    await commit("SetPublicAccessDocuments", response.data);
    await commit("SetPublicAccessDocumentLoading", false);
  },
  async GetAnpDocuments({ commit }) {
    commit("SetAnpDocumentLoading", true);
    let response = await axios.get("anpDocuments.php");
    await commit("SetAnpDocuments", response.data);
    await commit("SetAnpDocumentLoading", false);
  },
  async GetCurrentPolicies({ commit }) {
    commit("SetCurrentPoliciesLoading", true);
    let response = await axios.get("currentPolicies.php");
    await commit("SetCurrentPolicies", response.data);
    await commit("SetCurrentPoliciesLoading", false);
  },
  async GetRegulations({ commit }) {
    commit("SetRegulationsLoading", true);
    let response = await axios.get("regulations.php");
    await commit("SetRegulations", response.data);
    await commit("SetRegulationsLoading", false);
  },
  async AskForDownload({ commit }, data) {
    let response = await axios.post("fileRequest.php", data);
    await commit("SetRequestAnsw", response.data);
  },
  async ApproveFile({ commit }, data) {
    let response = await axios.get(
      "fileApprove.php?id=" + data.id + "&psec=" + data.psec
    );
    await commit("SetApproveAnsw", response.data);
  },
  async FileExists({ commit }, data) {
    let response = await axios.get("fileExists.php?psec=" + data.psec);
    await commit("SetDownloadAnsw", response.data);
  },
  GetPliego({ commit }, id) {
    commit("SetPliego", id);
  },
  CleanPliegos({ commit }) {
    commit("CleanPliegos");
  },
  ResetPliegos({ commit }) {
    commit("ResetPliegos");
  },
  ResetStatePolicies({ commit }) {
    commit("SetCurrentPolicies", null);
    commit("SetCurrentPoliciesLoading", false);
  },
  ResetStatePublicAccess({ commit }) {
    commit("SetPublicAccessDocuments", null);
    commit("SetPublicAccessDocumentLoading", false);
  },
  ResetStateRegulations({ commit }) {
    commit("SetRegulations", null);
    commit("SetRegulationsLoading", false);
  },
};

const mutations = {
  SetPublicAccessDocuments(state, l) {
    state.publicAccessDocument = l;
  },
  SetPublicAccessDocumentLoading(state, value) {
    state.publicAccessDocumentLoading = value;
  },
  SetAnpDocuments(state, l) {
    state.anpDocument = l;
  },
  SetAnpDocumentLoading(state, value) {
    state.anpDocumentLoading = value;
  },
  SetCurrentPolicies(state, l) {
    state.currentPolicies = l;
  },
  SetCurrentPoliciesLoading(state, value) {
    state.currentPoliciesLoading = value;
  },
  SetRegulations(state, l) {
    state.regulations = l;
  },
  SetRegulationsLoading(state, value) {
    state.regulationsLoading = value;
  },
  SetPliego(state, id) {
    state.pliego = state.pliegos[id];
  },
  SetRequestAnsw(state, data) {
    state.requestAnsw = data;
  },
  SetApproveAnsw(state, data) {
    state.approveAnsw = data;
  },
  SetDownloadAnsw(state, data) {
    state.downloadAnsw = data;
  },
  CleanPliegos(state) {
    state.pliegos = [];
  },
  ResetPliegos(state) {
    state.pliegos = [
      {
        id: 0,
        name: "Bases de la Convocatoria para la Contratación de Almacenaje  y Despacho a Buques Tanque  en Firme en la Terminal Puerto Rosales",
        fileName: "OTE - Expansion Puerto Rosales - Concurso Abierto.pdf",
        terminal: "puertoRosales",
      },
    ];
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
