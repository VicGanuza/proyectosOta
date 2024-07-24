<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/image_tank-storage-construction2_1920px.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'corporateGovernanceCompliance.title' ) }}
      </h1>
      <p class="font-weight-bold">{{ $t( 'corporateGovernanceCompliance.p1' ) }}</p>
      <p>{{ $t('corporateGovernanceCompliance.p2') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "CorporateGovernanceCompliance"
})
</script>
