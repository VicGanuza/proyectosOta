import axios from "axios";
import moment from "moment";

const state = {
  terminal: null,
  offices: null,
  terminalLoading: false,
  officesLoading: false,
  factsLoading: false,
  facts: null,
};

const getters = {
  StateTerminal: (state) => state.terminal,
  StateTerminalLoading: (state) => state.terminalLoading,
  StateOffices: (state) => state.offices,
  StateOfficesLoading: (state) => state.officesLoading,
  StateFactsLoading: (state) => state.factsLoading,
  StateFacts: (state) => state.facts,
};

const actions = {
  async GetTerminal({ commit }, id) {
    let response = await axios.get("terminal.php?id=" + id);
    commit("SetTerminalLoading", true);
    await commit("SetTerminal", response.data);
    await commit("SetTerminalLoading", false);
  },
  async GetOffices({ commit }, filtro) {
    commit("SetOfficesLoading", true);
    let response = await axios.get("offices.php", { params: filtro });
    await commit("SetOffices", response.data);
    await commit("SetOfficesLoading", false);
  },
  async GetFacts({ commit }) {
    commit("SetFactsLoading", true);
    let response = await axios.get("facts.php");
    await commit("SetFacts", response.data);
    await commit("SetFactsLoading", false);
  },
  ResetStateFacts({ commit }) {
    commit("SetFactsLoading", false);
    commit("SetFacts", null);
  },
  ResetStateOffice({ commit }) {
    commit("SetOffices", null);
    commit("SetOfficesLoading", false);
  },
  ResetStateTerminal({ commit }) {
    commit("SetTerminal", null);
    commit("SetTerminalLoading", false);
  },
};

const mutations = {
  SetTerminal(state, terminal) {
    if (terminal != null) {
      terminal.office = "offices." + terminal.terminal;
      terminal.title = "offices." + terminal.terminal;
      terminal.location = "locations." + terminal.location;
      terminal.img = terminal.terminal_page_img;
      terminal.officeImg = terminal.office_page_img;
      terminal.localTime = moment().zone(terminal.local_time).format("HH:mm");
      //terminal.terminalGoogleRoute=terminal.google_location ? terminal.google_location : "https://www.google.com/maps/dir//"+terminal.address+'+'+terminal.region+'+'+that.$t('locations.'+terminal.location)+'/@'+terminal.gps_coordinates+',4z?hl='+that.$i18n.locale;
      state.terminal = terminal;
    } else state.terminal = terminal;
  },
  SetOffices(state, offices) {
    if (offices != null) {
      offices.map((of) => {
        of.regionField = "locations." + of.country;
        of.companyTerminal = "offices." + of.terminal_type;
        of.productList = "";
        of.terminalPage = of.terminal_page == 1;
        return of;
      });
      state.offices = offices;
    } else state.office = null;
  },
  SetOfficesLoading(state, value) {
    state.officesLoading = value;
  },
  SetTerminalLoading(state, value) {
    state.terminalLoading = value;
  },
  SetFacts(state, facts) {
    state.facts = facts;
  },
  SetFactsLoading(state, value) {
    state.factsLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
