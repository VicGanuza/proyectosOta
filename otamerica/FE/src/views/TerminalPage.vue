<template>
  <div class="text-center" >
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="TerminalLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <TerminalComponent 
      v-if="!TerminalLoading && Terminal.activa == 1"
      v-bind:Id="id" 
      v-bind:Name="Terminal.name"
      v-bind:Office="Terminal.office"
      v-bind:TankTypes="Terminal.tank_types"
      v-bind:Products="Terminal.products"
      v-bind:Services="Terminal.services"
      v-bind:AccessTypes="Terminal.access_types"
      v-bind:Data="Terminal"></TerminalComponent>
      <v-container class="text-justify"
      v-if="!TerminalLoading && Terminal.activa == 0"
      >
      <div> 
        {{$t('terminalDoesNotExist')}}
        <button data-btn="default medium" @click="$router.back()">{{$t('goBack')}}</button>
        
      </div>
      </v-container>
  </div>
</template>

<script>

import { mapGetters, mapActions } from "vuex";

import TerminalComponent from '@/components/TerminalComponent.vue';

export default {
  name: "TerminalPage",
  props: ['id'],
  components: {
    TerminalComponent
  },
  created() {
    this.ResetStateTerminal();
    this.getTerminalData();
  },
  computed: {
    ...mapGetters(
      { TerminalLoading: "StateTerminalLoading", 
        Terminal: "StateTerminal", 
        
      }),
  },
  methods: {
    ...mapActions([ "GetTerminal","ResetStateTerminal"]),
    async getTerminalData() {
      await this.GetTerminal(this.id);
    }
  },
}
</script>