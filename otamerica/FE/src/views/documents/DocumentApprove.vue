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
      <p v-if="showMessage" class="font-weight-bold">{{ $t(Answ.message) }}</p>
    </v-container>    
  </div> 
</template>

<script>

import { mapGetters, mapActions } from "vuex";

export default {
  name: "DocumentApprove",
  props: ['id','psec'],
  data(){
    return {
      showMessage: true,
    }
  },
  created() {
    console.log(this.id,this.psec);
    this.GetPliego(this.id)
    this.approve();
  },
  computed: {
    ...mapGetters(
      { 
        Answ: "StateApproveAnsw", 
        Pliego: "StatePliego"
        
      }),
  },
  methods: {
     ...mapActions([ "GetPliego","ApproveFile"]),
    async approve() {
      await this.ApproveFile({id:this.id,psec:this.psec});
      console.log(this.Answ);
    }
  },
}
</script>