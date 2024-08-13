<template>
  <v-app>
    <header-app />
    <v-main>
      <router-view />
    </v-main>
    <v-footer app
      ><p>{{ $t("noCookies") }}</p></v-footer
    >
  </v-app>
</template>

<script>
import HeaderApp from "./components/HeaderApp.vue";
export default {
  components: { HeaderApp },
  name: "App",
};
</script>

<style lang="scss" src="./scss/main.scss"></style>
