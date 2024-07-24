<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/Responsability-Our Employees.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'ourEmployees.title' ) }}
      </h1>
      <h3>{{ $t( 'ourEmployees.subtitle' ) }}</h3>
      <p>{{ $t('ourEmployees.p1') }}</p>
      <p class="font-weight-bold">{{ $t( 'ourEmployees.laborStandards' ) }}</p>
      <p>{{ $t('ourEmployees.p2') }}</p>
      <p>{{ $t('ourEmployees.p3') }}</p>
      <p class="font-weight-bold">{{ $t( 'ourEmployees.equalOpportunity' ) }}</p>
      <p>{{ $t('ourEmployees.p4') }}</p>
      <p>{{ $t('ourEmployees.p5') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "OurEmployees"
})
</script>
