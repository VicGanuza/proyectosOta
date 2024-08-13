<template>
  <div>
    <v-img
      height="450"
      :src="require('@/assets/images/Hsse_landscape.jpg')"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("hsse.title") }}
      </h1>
      <h3>{{ $t("hsse.subtitle") }}</h3>
      <p>{{ $t("hsse.p1") }}</p>
      <p>{{ $t("hsse.p2") }}</p>
      <p>{{ $t("hsse.p3") }}</p>
      <p>{{ $t("hsse.p4") }}</p>
      <p>{{ $t("hsse.p5") }}</p>
      <p>{{ $t("hsse.p6") }}</p>
    </v-container>
  </div>
</template>
