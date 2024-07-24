<template>
  <div class="text-center">
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="TerminalLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <OfficeComponent
      v-if="!TerminalLoading && Terminal.activa == 1"
      v-bind:Id="id" 
      v-bind:Title="Terminal.title"
      v-bind:Location="Terminal.location"
      v-bind:TerminalGoogleRoute="TerminalGoogleRoute"
      v-bind:Data="Terminal"></OfficeComponent>
    <v-container class="text-justify"
      v-if="!TerminalLoading && Terminal.activa == 0"
      >
      <div> 
        {{$t('officeDoesNotExist')}}
        <button data-btn="default medium" @click="$router.back()">{{$t('goBack')}}</button>
        
      </div>
      </v-container>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import OfficeComponent from '@/components/OfficeComponent.vue';


export default {
  name: "OfficePage",
  props: ['id'],
  components: {
    OfficeComponent
  },
  created() {
    this.ResetStateTerminal();
    this.ResetStateOffice();
    this.getTerminalData();
  },
  computed: {
    ...mapGetters(
      { TerminalLoading: "StateTerminalLoading", 
        Terminal: "StateTerminal", 
      }),
      TerminalGoogleRoute(){
        let route = this.Terminal.google_location ? this.Terminal.google_location : "https://www.google.com/maps/dir//"+this.Terminal.address+'+'+this.Terminal.region+'+'+ this.$t('locations.'+this.Terminal.location)+'/@'+this.Terminal.gps_coordinates+',4z?hl='+this.$i18n.locale;
        return route;        
      }
  },
  methods: {
    ...mapActions([ "GetTerminal", "ResetStateOffice", "ResetStateTerminal"]),
   
    async getTerminalData() {
      await this.GetTerminal(this.id);
    }
    
  }
}
</script>