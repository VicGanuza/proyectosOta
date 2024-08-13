<template>
  <v-card class="mx-auto">
    <v-img
      :aspect-ratio="1"
      :src="require(`@/assets/images/news/${Img}`)"
    ></v-img>

    <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
      <span v-if="$i18n.locale === 'en'">{{ DateNews }}</span>
      <span v-if="$i18n.locale === 'es'">{{ FechaNews }}</span>
    </v-card-subtitle>
    <v-card-title>
      {{ $t(Headline) }}
    </v-card-title>

    <v-card-actions>
      <v-btn v-if="External" color="blue" text :href="`${Readmore}`">
        {{ $t("readMore") }}
      </v-btn>
      <v-btn v-else color="blue" text :to="`${Readmore}`">
        {{ $t("readMore") }}
      </v-btn>
      <v-spacer></v-spacer>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  name: "NewsTemplate",
  props: [
    "Id",
    "Headline",
    "DateNews",
    "FechaNews",
    "Img",
    "Readmore",
    "External",
  ],
};
</script>
