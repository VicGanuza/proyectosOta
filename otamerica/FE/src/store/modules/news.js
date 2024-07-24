import axios from "axios";
import moment from "moment";

const state = {
  news: null,
  newsLoading: false,
  newsList: null,
  newsListLoading: false,
};

const getters = {
  StateNews: (state) => state.news,
  StateNewsLoading: (state) => state.newsLoading,
  StateNewsList: (state) => state.newsList,
  StateNewsListLoading: (state) => state.NewsListLoading,
};

const actions = {
  async GetNews({ commit }, id) {
    let response = await axios.get("news.php?id=" + id);
    commit("SetNewsLoading", true);
    await commit("SetNews", response.data);
    await commit("SetNewsLoading", false);
  },
  async GetNewsList({ commit }) {
    commit("SetNewsListLoading", true);
    let response = await axios.get("news.php");
    await commit("SetNewsList", response.data);
    await commit("SetNewsListLoading", false);
  },
  ResetStateNewsList({commit}){
    commit("SetNewsList", null);
    commit("SetNewsListLoading", false);
  }
};

const mutations = {
  SetNews(state, news) {
    news.title = "news." + news.headline;
    news.date = moment(news.date).format("LL");
    news.fecha = moment(news.date).locale("es").format("LL");
    state.news = news;
  },
  SetNewsList(state, list) {
    if (list != null) {
      list.map((l) => {
        l.title = "news." + l.headline;
        l.fecha = moment(l.date).locale("es").format("LL");
        l.date = moment(l.date).format("LL");
        return l;
      });
    }
    state.newsList = list;
  },
  SetNewsListLoading(state, value) {
    state.newsListLoading = value;
  },
  SetNewsLoading(state, value) {
    state.newsLoading = value;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
