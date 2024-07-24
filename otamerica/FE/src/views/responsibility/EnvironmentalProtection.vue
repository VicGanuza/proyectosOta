<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/pordosol_landpage.png"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'environmentalProtection.title' ) }}
      </h1>
      <h3>{{ $t( 'environmentalProtection.subtitle' ) }}</h3>
      <p>{{ $t('environmentalProtection.p1') }}</p>
      <p>{{ $t('environmentalProtection.p2') }}</p>
      <p>{{ $t('environmentalProtection.p3') }}</p>
      <p class="font-weight-bold">{{ $t( 'environmentalProtection.energyConsumptionSavings' ) }}</p>
      <p>{{ $t('environmentalProtection.p4') }}</p>
      <p>{{ $t('environmentalProtection.p5') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "EnvironmentalProtection"
})
</script>
