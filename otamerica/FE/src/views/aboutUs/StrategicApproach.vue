<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/About Us-Strategic Approach.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t( 'strategicApproach.title' ) }}
      </h1>
      <h2>{{ $t( 'strategicApproach.subtitle' ) }}</h2>
      <p>{{ $t('strategicApproach.p1') }}</p>
      <p class="my-4 blue--text text--accent-4">{{$t('strategicApproach.weCanWeCare')}}</p>
      <p>{{ $t('strategicApproach.p2') }}</p>
      <p>{{ $t('strategicApproach.p3') }}</p>
      <p class="my-4 blue--text text--accent-4">{{$t('strategicApproach.weFocusOn')}}</p>
      <p class="font-weight-bold">{{ $t( 'strategicApproach.operationalExcellence' ) }}</p>
      <p>{{ $t('strategicApproach.p4') }}</p>
      <p class="font-weight-bold">{{ $t( 'strategicApproach.safetyLeadership' ) }}</p>
      <p>{{ $t('strategicApproach.p5') }}</p>
      <p class="font-weight-bold">{{ $t( 'strategicApproach.environmentalProtection' ) }}</p>
      <p>{{ $t('strategicApproach.p6') }}</p>
      <p class="font-weight-bold">{{ $t( 'strategicApproach.humanResources' ) }}</p>
      <p>{{ $t('strategicApproach.p7') }}</p>
    </v-container>
  </div>
</template>
<script>
export default({
  name: "StrategicApproach"
})
</script>
