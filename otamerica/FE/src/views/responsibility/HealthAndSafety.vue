<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/DSC0225.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'healthAndSafety.title' ) }}
      </h1>
      <h3>{{ $t( 'healthAndSafety.subtitle' ) }}</h3>
      <p class="font-weight-bold">{{ $t( 'healthAndSafety.riskAssessment' ) }}</p>
      <p>{{ $t('healthAndSafety.p1') }}</p>
      <p>{{ $t('healthAndSafety.p2') }}</p>
      <p class="font-weight-bold">{{ $t( 'healthAndSafety.preventiveMedicalCare' ) }}</p>
      <p>{{ $t('healthAndSafety.p3') }}</p>
      <p class="font-weight-bold">{{ $t( 'healthAndSafety.healthAndSafetyBusinessTrips' ) }}</p>
      <p>{{ $t('healthAndSafety.p4') }}</p>
      <p>{{ $t('healthAndSafety.p5') }}</p>
      <p class="font-weight-bold">{{ $t( 'healthAndSafety.fireProtection' ) }}</p>
      <p>{{ $t('healthAndSafety.p6') }}</p>
      <p>{{ $t('healthAndSafety.p7') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "HealthAndSafety"
})
</script>
