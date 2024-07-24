<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/terminals/Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'puertoRosales.title' ) }}
      </h1>
      <!--<p class="font-weight-bold">Disponible a partir del lunes 17/10/2022</p>-->
      <p class="font-weight-bold">{{ $t( 'puertoRosales.subtitle' ) }}</p>
      <ul class="my-4">
        <div v-for="item in Documents "
              :key="item.name">
          <li v-if="item.terminal == 'puertoRosales'">
            <router-link :to="`/documentForm/${item.id}`">{{item.name}}</router-link>
           </li>
        </div>
      </ul>
    </v-container>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default({
  name: "PuertoRosales",
  computed: {
    ...mapGetters({  Documents: "StatePliegos"}),
  },
  created() {
    this.CleanPliegos();
    this.ResetPliegos();
  },
  methods: {
     ...mapActions([ "CleanPliegos","ResetPliegos"]),
  }
})
</script>
