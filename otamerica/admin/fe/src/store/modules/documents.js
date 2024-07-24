import axios from "axios";

const state = {
  document: {
    name: "",
    office: 0,
    url: "",
  },
  documentList: null,
};

const getters = {
  StateDocument: (state) => state.document,
  StateDocumentList: (state) => state.documentList,
};

const actions = {
  async CreateDocument({ commit }, document) {
    const Data = new FormData();
    Data.append("name", document.name);
    Data.append("office", document.office);
    Data.append("user", document.user);
    Data.append("file", document.file);

    await axios.post("documents/create.php", Data);
    await commit("SetDocument", document);
  },
  async GetDocument({ commit }, data) {
    if (data.id != 0) {
      let res = await axios.get("documents/get.php", { params: data });
      await commit("SetDocument", res.data);
    } else {
      await commit("SetDocument", { name: "", office: 0 });
    }
  },
  async EditDocument({ commit }, document) {
    const Data = new FormData();
    Data.append("id", document.id);
    Data.append("name", document.name);
    Data.append("office", document.office);
    Data.append("user", document.user);
    if (document.file) Data.append("file", document.file);

    await axios.post("documents/edit.php", Data);
    await commit("SetDocument", document);
  },
  async GetDocumentList({ commit }, user) {
    let response = await axios.get("documents/get.php", {
      params: { user: user },
    });
    await commit("SetDocumentList", response.data);
  },
};

const mutations = {
  SetDocument(state, document) {
    state.document = document;
  },
  SetDocumentList(state, documents) {
    state.documentList = documents;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
