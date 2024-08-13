<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/news/Oiltanking Logística Brasil_1.jpg"
       ></v-img>
    <!-- 
      src="@/assets/images/terminals/Oiltanking_Belgium_Antwerp_Gas_Terminal_NV_Image_tanks1_1920px.jpg"
     -->

    <v-container class="text-justify">
      <h1>
        {{ $t( 'terminalSuape.title' ) }}
      </h1>
      <p class="font-weight-bold">{{ $t( 'terminalSuape.subtitle' ) }}</p>
      <p>{{ $t('terminalSuape.p1') }}</p>
      <p>{{ $t('terminalSuape.p2') }}</p>
      <p>{{ $t('terminalSuape.p3') }}</p>
      <p>{{ $t('terminalSuape.p4') }}</p>
      <p v-html="$t('terminalSuape.p5')"></p>
      <p v-html="$t('terminalSuape.p6')"></p>
      <p v-html="$t('terminalSuape.p7')"></p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "TerminalSuape",
})
</script>
