<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/news/gptw-latam-v2.jpg"
       ></v-img>
    <!-- 
      src="@/assets/images/terminals/Oiltanking_Belgium_Antwerp_Gas_Terminal_NV_Image_tanks1_1920px.jpg"
     -->

    <v-container class="text-justify">
      <h1>
        {{ $t( 'greatPlaceToWork.title' ) }}
      </h1>
      <p v-html="$t('greatPlaceToWork.p1')"></p>
      <p v-html="$t('greatPlaceToWork.p2')"></p>
      <p v-html="$t('greatPlaceToWork.p3')"></p>
      <p v-html="$t('greatPlaceToWork.p4')"></p>
      <p v-html="$t('greatPlaceToWork.p5')"></p>
      <p v-html="$t('greatPlaceToWork.p6')"></p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "GreatPlaceToWork",
})
</script>
