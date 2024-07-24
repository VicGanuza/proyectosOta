import axios from "axios";

const state = {
  certificate: null,
  certificateList: null,
  certificateLoading: null,
};

const getters = {
  StateCertificate: (state) => state.certificate,
  StateCertificateList: (state) => state.certificateList,
  StateCertificateLoading: (state) => state.certificateLoading,
};

const actions = {
  async GetCertificate({ commit }, data) {
    commit("SetCertificateLoading", true);
    let response = await axios.get("certificates/get.php", {
      params: data,
    });
    await commit("SetCertificate", response.data);
    await commit("SetCertificateLoading", false);
  },
  async GetCertificateList({ commit }, user) {
    console.log(user);
    commit("SetCertificateLoading", true);
    let response = await axios.get("certificates/get.php", {
      params: { user: user },
    });
    await commit("SetCertificateList", response.data);
    await commit("SetCertificateLoading", false);
  },
  async EditCertificate({ commit }, certificate) {
    const Data = new FormData();
    Data.append("id", certificate.id);
    Data.append("user", certificate.user);
    Data.append("name", certificate.name);
    Data.append("region", certificate.region);
    Data.append("file", certificate.file);

    await axios.post("certificates/edit.php", Data);
    await commit("SetCertificate", certificate);
  },
};

const mutations = {
  SetCertificate(state, cert) {
    state.certificate = cert;
  },
  SetCertificateList(state, list) {
    state.certificateList = list;
  },
  SetCertificateLoading(state, value) {
    state.certificateLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
