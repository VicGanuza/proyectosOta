<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="require('@/assets/images/DSC0455.jpg')"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("sustainabilityStrategy.title") }}
      </h1>
      <h3>{{ $t("sustainabilityStrategy.subtitle") }}</h3>
      <p>{{ $t("sustainabilityStrategy.p1") }}</p>
      <p>{{ $t("sustainabilityStrategy.p2") }}</p>
      <router-link to="/strategicActionAreas">
        <v-img
          :aspect-ratio="1"
          width="340"
          v-if="$i18n.locale === 'es'"
          :src="require('@/assets/images/Sostenibilidad.png')"
          class="mx-auto my-4"
        ></v-img>
        <v-img
          :aspect-ratio="1"
          width="340"
          v-if="$i18n.locale === 'pt'"
          :src="require('@/assets/images/Sustentabilidade.png')"
          class="mx-auto my-4"
        ></v-img>
        <v-img
          :aspect-ratio="1"
          width="340"
          v-if="$i18n.locale === 'en'"
          :src="require('@/assets/images/Sustainability.png')"
          class="mx-auto my-4"
        ></v-img>
      </router-link>
      <p>{{ $t("sustainabilityStrategy.p3") }}</p>
    </v-container>
  </div>
</template>
