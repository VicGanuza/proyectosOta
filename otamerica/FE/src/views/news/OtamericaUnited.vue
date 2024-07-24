<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/news/image006.png"
       ></v-img>
    <!-- 
      src="@/assets/images/terminals/Oiltanking_Belgium_Antwerp_Gas_Terminal_NV_Image_tanks1_1920px.jpg"
     -->

    <v-container class="text-justify">
      <h1>
        {{ $t( 'otamericaUnited.title' ) }}
      </h1>
      <p v-html="$t('otamericaUnited.p1')"></p>
      <p v-html="$t('otamericaUnited.p2')"></p>
      <p v-html="$t('otamericaUnited.p3')"></p>
      <p v-html="$t('otamericaUnited.p4')"></p>
      <p v-html="$t('otamericaUnited.p5')"></p>
      <p v-html="$t('otamericaUnited.p6')"></p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "OtamericaUnited",
})
</script>
