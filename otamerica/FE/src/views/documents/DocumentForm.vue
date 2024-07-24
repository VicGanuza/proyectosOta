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
      <div v-if="!showMessage">
        <DocumentFormComponent 
          v-bind:Id="id" 
          v-bind:ShowMessage="showMessage"
          v-on:update:ShowMessage="showMessage = $event"
          v-bind:Message="message"
          v-on:update:Message="message = $event"
          v-bind:FileName="Pliego.fileName"
          v-bind:FileTitle="Pliego.name"></DocumentFormComponent>
      </div>
      <div v-else>
        <p class="font-weight-bold">{{ $t(message) }}</p>
      </div>
    </v-container>    
  </div> 
</template>

<script>

import { mapGetters, mapActions } from "vuex";

import DocumentFormComponent from '@/components/DocumentFormComponent';

export default {
  name: "DocumentForm",
  props: ['id'],
  data(){
    return {
      showMessage: false,
    }
  },
  components: {
    DocumentFormComponent
  },
  created() {
    this.getPliegoById();
  },
  computed: {
    ...mapGetters(
      { 
        Pliego: "StatePliego", 
        
      }),
  },
  methods: {
    ...mapActions([ "GetPliego"]),
    getPliegoById() {
      this.GetPliego(this.id);
    }
  },
}
</script>