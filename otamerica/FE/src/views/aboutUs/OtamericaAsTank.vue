<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      src="@/assets/images/about/about_us_1.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("otamericaAsTank.title") }}
      </h1>
      <h2 class="w-700">{{ $t("otamericaAsTank.subtitle") }}</h2>
      <p>{{ $t("otamericaAsTank.p1") }}</p>
      <p>{{ $t("otamericaAsTank.p2") }}</p>
      <p>{{ $t("otamericaAsTank.p3") }}</p>
      <p>{{ $t("otamericaAsTank.p4") }}</p>
      <p>{{ $t("otamericaAsTank.p5") }}</p>
      <p>{{ $t("otamericaAsTank.p6") }}</p>
    </v-container>
  </div>
</template>
<script>
export default {
  name: "OtamericaAsTank",
};
</script>
