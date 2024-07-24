<template>
  <div class="home">
    <Menu v-bind:Items="Access"></Menu>
    <div class="content">
      <div v-if="home">
        <Cards v-bind:Items="Access"></Cards>
      </div>
      <router-view />
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import Menu from "@/components/Menu.vue";
import Cards from "@/components/Cards.vue";

export default {
  name: "Home",
  components: {
    Menu,
    Cards
  },
  created: function() {
    this.GetUserAccess();
  },
  computed: {
    ...mapGetters({ Access: "StateAccess", User: "StateUserLogged" }),
    home(){
      return this.$route.path === '/'
    }
  },
  methods: {
    ...mapActions(["GetAccess"]),
    GetUserAccess(){
      this.GetAccess(this.User);
    }
  }
};
</script>
