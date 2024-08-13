<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="require('@/assets/images/DSC0176.jpg')"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("hssePolicy.title") }}
      </h1>
      <h3>{{ $t("hssePolicy.subtitle") }}</h3>
      <p>{{ $t("hssePolicy.p1") }}</p>
      <p v-html="$t('hssePolicy.p2')"></p>
      <p>{{ $t("hssePolicy.p3") }}</p>
    </v-container>
  </div>
</template>
<script>
export default {
  name: "HssePolicy",
  computed: {
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    },
  },
};
</script>
