<template>
  <div class="text-center" >
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/terminals/Oiltanking_South-America_Argentina_Puerto-Rosales_Tanks_2009-03-04_1070341.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t('jdpProgram.title' ) }}
      </h1>
      <h3>{{ $t( 'jdpProgram.subtitle1' ) }}</h3>
      <h3>{{ $t( 'jdpProgram.subtitle2' ) }}</h3>
      <h3 class="font-weight-bold">{{ $t( 'jdpProgram.subtitle3' ) }}</h3>
      <h1>
        {{ $t('jdpProgram.modularStructure' ) }}
      </h1>
      <v-row class="my-8">
        <v-col cols="12" md="6">
          <p v-html="$t('jdpProgram.p1')"></p>
          <p v-html="$t('jdpProgram.p2')"></p>
        </v-col>
        <v-col cols="12" md="6">
          <v-img
            height="350"
            src="@/assets/images/jdpProgram/jdpProgram1.jpg"
          ></v-img>
        </v-col>
      </v-row>
      <p class="font-weight-bold">{{ $t('jdpProgram.p3') }}</p>
      <p v-html="$t('jdpProgram.p4')"></p>
      <!-- <v-btn
        depressed
        large
        target="_blank"
        href="https://grupociadetalentos.com/Oiltanking2023/#prerequisites"
      >
        {{ $t( 'jdpProgram.applyHere' ) }}
      </v-btn> -->
    </v-container>    
  </div> 
</template>

<script>

export default {
  name: "JdpProgram",
}
</script>