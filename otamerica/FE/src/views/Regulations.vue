<template>
  <div class="text-center">
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="RegulationsLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <div v-if="!RegulationsLoading">    
      <v-img
        :aspect-ratio="16/9"
        height="450"
        src="@/assets/images/terminals/Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg"
      ></v-img>
      <v-container class="text-justify">
        <h1 class="my-5">
          {{$t('regulations.title')}}
        </h1>
        <ul>
          <li v-for="d in Regulations" :key="d.id">
            <a :href="`${appPath}fileDownload.php?name=${d.url}`"  target="_blank">{{ $t(d.name) }}</a>
          </li>
        </ul>
      </v-container>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "Regulations",
  created() {
    this.ResetStateRegulations();
    this.GetRegulations();
  },
  computed: {
    ...mapGetters({ Regulations: "StateRegulations", RegulationsLoading: "StateRegulationsLoading"}),
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    } 
  },
  methods: {
    ...mapActions([ "GetRegulations","ResetStateRegulations"]),
  },
}
</script>