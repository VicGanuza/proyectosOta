<template>
  <div id="nav" class="navbar">
    <img src="@/assets/logo-otamerica.svg">
    <div class="flex-center" v-if="showNav">
      <router-link to="/">{{$t('menu.home')}}</router-link> |
      <span v-if="isLoggedIn">
        <a @click="logout">{{$t('menu.logout')}}</a>
      </span>
      <span v-else>
        <router-link to="/login">{{$t('menu.login')}}</router-link>
      </span>
      <button data-btn="default circle" type="button" @click.stop="showMenu = !showMenu">
        <MdiSvg> {{ mdiWeb }} </MdiSvg>
      </button>
      <ul class="dropdown" v-bind:class="{ 'display-block': showMenu }">
        <li @click="changeLocale('en')"><span title="us" class="flag-icon flag-icon-us"></span>{{$t('lang.english')}}</li>
        <li @click="changeLocale('es')"><span title="es" class="flag-icon flag-icon-es"></span>{{$t('lang.spanish')}}</li>
      </ul>
      
    </div>
  </div>
</template>
<script>
import { mdiWeb } from "@mdi/js"
import i18n from '@/plugins/i18n';

export default {
  name: "NavBar",
  data: () => ({
    mdiWeb,
    showMenu: false
  }),
  computed: {
    isLoggedIn: function() {
      return this.$store.getters.isAuthenticated;
    },
    showNav() {
      return this.$route.path !== '/restrictedAccess'
    } 
  },
  methods: {
    changeLocale(locale) {
      i18n.locale = locale;
      this.showMenu = !this.showMenu;
      localStorage.setItem('lang',locale)
    },
    async logout() {
      await this.$store.dispatch("LogOut");
      this.$router.push("/login");
    },
  },
};
</script>

