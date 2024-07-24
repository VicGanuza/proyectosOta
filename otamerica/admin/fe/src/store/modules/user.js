import axios from "axios";
import md5 from "md5";

const state = {
  user: {
    id: 0,
    username: "",
    location: 0,
  },
  userList: null,
};

const getters = {
  StateUser: (state) => state.user,
  StateUserList: (state) => state.userList,
};

const actions = {
  async CreateUser({ commit }, user) {
    const Data = new FormData();
    Data.append("username", user.username);
    Data.append("location", user.location);
    Data.append("password", md5(user.password));

    await axios.post("users/create.php", Data);
    await commit("SetUser", user);
  },

  async GetUser({ commit }, id) {
    if (id != 0) {
      let res = await axios.get("users/get.php?id=" + id);
      await commit("SetUser", res.data);
    } else {
      await commit("SetUser", { id: 0, username: "", location: 0 });
    }
  },

  async EditUser({ commit }, user) {
    const Data = new FormData();
    Data.append("username", user.username);
    Data.append("location", user.location);
    Data.append("id", user.id);
    if (user.password) {
      Data.append("password", md5(user.password));
    }
    if (user.newPassword) {
      Data.append("newPassword", md5(user.newPassword));
    }

    await axios.post("users/edit.php", Data);
    await commit("SetUser", user);
  },

  async GetUserList({ commit }, filtro) {
    let location = filtro.location;
    let response = await axios.get("users/get.php?location=" + location);
    commit("SetUserList", response.data);
  },
};

const mutations = {
  SetUser(state, user) {
    state.user = user;
  },

  SetUserList(state, list) {
    state.userList = list;
  },
};

export default {
  state,
  getters,
  actions,
  mutations,
};
