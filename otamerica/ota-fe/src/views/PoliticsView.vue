<template>
  <div class="text-center">
    <!-- <OtaCarousel v-bind:Imgs=items></OtaCarousel> -->
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="PublicAccessDocumentLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <div v-if="!PublicAccessDocumentLoading">
      <v-img
        :aspect-ratio="16 / 9"
        height="450"
        :src="
          require('@/assets/images/terminals/Oiltanking_South-America_Brazil_Vitoria_Tanks-Landscape_2012-06-28_10.jpg')
        "
      ></v-img>
      <v-container class="text-justify">
        <h1>
          {{ $t("politics.title") }}
        </h1>
        <h2>{{ $t("politics.subtitle1") }}</h2>
        <p>
          {{ $t("politics.p1") }}
        </p>
        <p>
          {{ $t("politics.p2") }}
        </p>
        <ul>
          <li v-for="d in PublicAccessDocument" :key="d.id">
            <a
              :href="`${appPath}fileDownload.php?name=${d.url}`"
              target="_blank"
            >
              {{ $t(d.name) }}
            </a>
          </li>
        </ul>
      </v-container>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "PoliticsView",
  props: ["Id"],
  created: function () {
    this.ResetStatePublicAccess();
    this.getDocuments();
  },
  computed: {
    ...mapGetters({
      PublicAccessDocumentLoading: "StatePublicAccessDocumentLoading",
      PublicAccessDocument: "StatePublicAccessDocuments",
    }),
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    },
  },
  methods: {
    ...mapActions(["GetPublicAccessDocuments", "ResetStatePublicAccess"]),
    async getDocuments() {
      await this.GetPublicAccessDocuments();
    },
  },
};
</script>
