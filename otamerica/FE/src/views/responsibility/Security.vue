<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/Responsability-HSSE-Security.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'security.title' ) }}
      </h1>
      <h3>{{ $t( 'security.subtitle' ) }}</h3>
      <p class="font-weight-bold">{{ $t( 'security.securityOurFacilities' ) }}</p>
      <p>{{ $t('security.p1') }}</p>
      <p>{{ $t('security.p2') }}</p>
      <p v-html="$t('security.p3')"></p>
      <p class="font-weight-bold">{{ $t( 'security.dataProtection' ) }}</p>
      <p>{{ $t('security.p4') }}</p>
      <p>{{ $t('security.p5') }}</p>
      <p>{{ $t('security.p6') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "Security"
})
</script>
