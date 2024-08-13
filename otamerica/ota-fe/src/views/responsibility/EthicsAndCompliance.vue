<template>
  <div>
    <v-img height="450" :src="require('@/assets/images/DSC0320.jpg')"></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("ethicsAndCompliance.title") }}
      </h1>
      <h3 v-html="$t('ethicsAndCompliance.subtitle')"></h3>
      <p
        class="font-weight-bold"
        v-html="$t('ethicsAndCompliance.complianceManagementSystem')"
      ></p>
      <p>{{ $t("ethicsAndCompliance.p1") }}</p>
      <p class="font-weight-bold">
        {{ $t("ethicsAndCompliance.ethicsComplianceCharterAndPolicies") }}
      </p>
      <p v-html="$t('ethicsAndCompliance.p2')"></p>
      <p class="font-weight-bold">
        {{ $t("ethicsAndCompliance.reportingMisconduct") }}
      </p>
      <p>{{ $t("ethicsAndCompliance.p3") }}</p>
      <p v-html="$t('ethicsAndCompliance.p4')"></p>
      <p v-html="$t('ethicsAndCompliance.p5')"></p>
      <!-- <div v-if="Policies.length > 0"> -->
      <p class="font-weight-bold">
        {{ $t("ethicsAndCompliance.currentPolicies") }}
      </p>
      <ul class="my-4">
        <li v-for="item in Policies" :key="item.name">
          <a
            :href="`${appPath}fileDownload.php?name=${item.url}`"
            target="_blank"
          >
            {{ $t(item.name) }}
          </a>
          <!--<a :href="`https://otamerica.com/files/${item.url}`"  target="_blank">{{ $t(item.name) }}</a>-->
        </li>
      </ul>
      <!-- </div> -->
    </v-container>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "EthicsAndCompliance",
  created() {
    this.ResetStatePolicies();
    this.GetCurrentPolicies();
  },
  computed: {
    ...mapGetters({ Policies: "StateCurrentPolicies" }),
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    },
  },
  methods: {
    ...mapActions(["GetCurrentPolicies", "ResetStatePolicies"]),
  },
};
</script>
