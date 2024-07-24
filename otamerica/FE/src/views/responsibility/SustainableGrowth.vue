<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      src="@/assets/images/Oiltanking_South-America_Brazil_Vitoria_Tanks_2015-02-04_5.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("sustainableGrowth.title") }}
      </h1>
      <h3>{{ $t("sustainableGrowth.description") }}</h3>
      <p>{{ $t("sustainableGrowth.p") }}</p>
      <p class="font-weight-bold">
        {{ $t("sustainableGrowth.riskManagement") }}
      </p>
      <p>{{ $t("sustainableGrowth.rmp") }}</p>
      <ul class="mb-4">
        <li>{{ $t("sustainableGrowth.l1") }}</li>
        <li>{{ $t("sustainableGrowth.l2") }}</li>
        <li>{{ $t("sustainableGrowth.l3") }}</li>
        <li>{{ $t("sustainableGrowth.l4") }}</li>
        <li>{{ $t("sustainableGrowth.l5") }}</li>
        <li>{{ $t("sustainableGrowth.l6") }}</li>
        <li>{{ $t("sustainableGrowth.l7") }}</li>
      </ul>
      <p class="font-weight-bold">
        {{ $t("sustainableGrowth.supplierCustomerRelations") }}
      </p>
      <p>{{ $t("sustainableGrowth.scrp1") }}</p>
      <p>{{ $t("sustainableGrowth.scrp2") }}</p>
      <h3>
        {{ $t("sustainableGrowth.esgReport.title") }}
      </h3>
      <p>{{ $t("sustainableGrowth.esgReport.d1") }}</p>
      <p>{{ $t("sustainableGrowth.esgReport.d2") }}</p>
      <p>{{ $t("sustainableGrowth.esgReport.d3") }}</p>
      <a v-if="$i18n.locale === 'es'"
        href="/otamerica-ws/controllers/fileDownload.php?name=otamerica_reporte-sustentabilidad-2022.pdf"  
        target="_blank">{{ $t("sustainableGrowth.esgReport.link") }}</a>
      <a v-else
         href="/otamerica-ws/controllers/fileDownload.php?name=otamerica_sustainability-report-2022.pdf"  
         target="_blank">{{ $t("sustainableGrowth.esgReport.link") }}</a>

    </v-container>
  </div>
</template>
<script>
export default {
  name: "SustainableGrowth",
};
</script>
