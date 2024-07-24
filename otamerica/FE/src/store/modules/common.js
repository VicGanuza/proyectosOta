import moment from "moment";
import axios from "axios";

const state = {
  years: [],
  months: [],
  currentYear: moment().year(),
  currentMonth: moment().month(),
  totalMonths: [
    { id: 0, name: "month.all", lang_key: "month.all" },
    { id: 1, name: "month.january", lang_key: "month.january" },
    { id: 2, name: "month.february", lang_key: "month.february" },
    { id: 3, name: "month.march", lang_key: "month.march" },
    { id: 4, name: "month.april", lang_key: "month.april" },
    { id: 5, name: "month.may", lang_key: "month.may" },
    { id: 6, name: "month.june", lang_key: "month.june" },
    { id: 7, name: "month.july", lang_key: "month.july" },
    { id: 8, name: "month.august", lang_key: "month.august" },
    { id: 9, name: "month.september", lang_key: "month.september" },
    { id: 10, name: "month.october", lang_key: "month.october" },
    { id: 11, name: "month.november", lang_key: "month.november" },
    { id: 12, name: "month.december", lang_key: "month.december" },
  ],
  locations: [],
};

const getters = {
  StateYears: (state) => state.years,
  StateMonths: (state) => state.months,
  StateTotalMonths: (state) => state.totalMonths,
  StateCurrentYear: (state) => state.currentYear,
  StateCurrentMonth: (state) => state.currentMonth,
  StateLocation: (state) => state.locations,
};

const actions = {
  async UpdateYears({ commit }) {
    let res = await axios.get("getYearsHistorical.php");
    commit("SetYears", res.data);
  },
  async UpdateMonths({ commit }, year) {
    let m = [{ id: 0, name: "month.all", lang_key: "month.all" }];
    let res = await axios.get("getMonthHistorical.php?y=" + year);
    res.data.forEach((el) => {
      m.push(state.totalMonths[el.month]);
    });

    commit("SetMonths", m);
  },
  async GetLocations({ commit }) {
    let res = await axios.get("locations.php");
    await commit("SetLocations", res.data);
  },
  ResetStateLocations({ commit }) {
    commit("SetLocations", []);
  },
};

const mutations = {
  SetYears(state, years) {
    state.years = years;
  },
  SetMonths(state, months) {
    state.months = months;
  },
  SetLocations(state, loc) {
    state.locations = loc;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
