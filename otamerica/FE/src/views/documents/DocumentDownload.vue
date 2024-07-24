<template>
  <div class="text-center" >
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/terminals/Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( Pliego.terminal+'.title' ) }}
      </h1>
      <div v-if="showLink">
        <p class="font-weight-bold">{{ $t('documentForm.timeReminder') }}</p>
       <!--  <a :href="`https://otamerica.com/${Answ.file}`" target="_blank" class="font-weight-bold">{{ $t(Answ.message) }}</a> -->
        <a :href="`${appPath}fileDownload.php?psec=${psec}`" target="_blank" class="font-weight-bold">{{ $t(Answ.message) }}</a>
      </div>
      <p v-else class="font-weight-bold">{{ $t(Answ.message) }}</p>
    </v-container>    
  </div> 
</template>

<script>

import { mapGetters, mapActions } from "vuex";

export default {
  name: "DocumentDownload",
  props: ['id','psec'],
  data(){
    return {
      showLink: false,
    }
  },
  created() {
    this.GetPliego(this.id)
    this.approve();
  },
  computed: {
    ...mapGetters(
      { 
        Answ: "StateDownloadAnsw", 
        Pliego: "StatePliego"
        
      }),
      appPath() {
        return process.env.VUE_APP_RUTA_API;
      } 
  },
  methods: {
     ...mapActions([ "GetPliego","FileExists"]),
    async approve() {
      await this.FileExists({psec:this.psec, type:'solicitudes'});
      if (this.Answ.exists){
        this.showLink = true;
     } else {
        this.showLink = false;
      }
    }
  },
}
</script>