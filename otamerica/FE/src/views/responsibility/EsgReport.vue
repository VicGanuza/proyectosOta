<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      src="@/assets/images/Oiltanking_South-America_Brazil_Vitoria_Tanks_2015-02-04_5.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("sustainableGrowth.esgReport.title") }}
      </h1>
      <p>{{ $t("sustainableGrowth.esgReport.d1") }}</p>
      <p>{{ $t("sustainableGrowth.esgReport.d2") }}</p>
      <p>{{ $t("sustainableGrowth.esgReport.d3") }}</p>
      <a href="/otamerica-ws/controllers/fileDownload.php?name=otamerica_sustainability-report-2023.pdf"  target="_blank">{{ $t("sustainableGrowth.esgReport.link") }}</a> 
      <!--<div v-if="$i18n.locale === 'es'"><a href="/otamerica-ws/controllers/fileDownload.php?name=otamerica_reporte-sustentabilidad-2023.pdf"  target="_blank">{{ $t("sustainableGrowth.esgReport.link") }}</a></div>
      <div v-else><a href="/otamerica-ws/controllers/fileDownload.php?name=otamerica_sustainability-report-2023.pdf"  target="_blank">{{ $t("sustainableGrowth.esgReport.link") }}</a></div>-->
    </v-container>
  </div>
</template>
<script>
export default {
  name: "EsgReport",
};
</script>
