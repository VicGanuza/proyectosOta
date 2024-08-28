<template>
  <div class="text-center">
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="HistoricalLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <div v-if="!HistoricalLoading">
      <v-img
        :aspect-ratio="16 / 9"
        height="450"
        :src="
          require('@/assets/images/terminals/Oiltanking_South-America_Brazil_Vitoria_Tanks-Landscape_2012-06-28_10.jpg')
        "
      ></v-img>
      <v-container class="text-justify">
        <h1 class="my-5">
          {{ $t("bulkLiquidHandling.title") }}
        </h1>
        <h2 class="blue--text text--accent-4">
          {{ $t("bulkLiquidHandling.subtitle1") }}
        </h2>
        <p>
          {{ $t("bulkLiquidHandling.p1") }}
        </p>
        <p>
          {{ $t("bulkLiquidHandling.p3") }}
        </p>
        <ul>
          <li v-for="d in Documents" :key="d.id">
            {{ $t(d.name) }}
            <a
              v-if="d.pdf"
              :href="`${appPath}fileDownload.php?name=${d.pdf}`"
              target="_blank"
            >
              <v-icon color="blue" large>mdi-file-pdf-box</v-icon>
            </a>
            <a
              v-if="d.excel"
              :href="`${appPath}fileDownload.php?name=${d.excel}`"
              target="_blank"
            >
              <v-icon color="green" large>mdi-microsoft-excel</v-icon>
            </a>
          </li>
        </ul>
         <!-- <v-row>
          <v-select
            class="pa-2"
            :items="Years"
            :label="$t('year')"
            v-model="filtro.year"
            item-title="name"
            item-value="id"
            single-line
            @update:modelValue="getMonths()"
          ></v-select>
          <v-select
            class="pa-2"
            :items="MonthsTran"
            :label="$t('monthLabel')"
            v-model="filtro.month"
            item-title="name"
            item-value="id"
            single-line
          ></v-select>
         @update:modelValue="getHistoryDocuments()" 
        </v-row>-->
        <v-list dense max-width="500">
          <v-header class="text--red text--accent4 font-weight-black my-5">
            {{ $t("bulkLiquidHandling.subtitle2") }}
          </v-header>
          <v-list-item-group color="blue">
            <v-list-item
              v-for="(item, i) in HistoricalMovements"
              :key="i"
              :href="`${appPath}fileDownload.php?name=${item.url}`"
              target="_blank"
            >
              <v-list-item-content>
                <v-list-item-title v-if="item.name" class="my-1">
                  {{ item.name }}
                </v-list-item-title>
                <v-list-item-title v-else class="my-1">{{
                  $filters.dateFormat(item)
                }}</v-list-item-title>
                <!--  /* | formatDate REVISAR FILROS V3 */ -->
                <v-list-item-subtitle>
                  ({{ item.type }} / {{ item.size }})
                </v-list-item-subtitle>
                <v-list-item-subtitle v-if="item.updated">
                  {{ $t("updated") }} : {{ item.fecha }}
                </v-list-item-subtitle>
              </v-list-item-content>
              <v-list-item-icon>
                <v-icon v-if="item.type === 'PDF'">mdi-file-pdf-box</v-icon>
                <v-icon v-else>mdi-microsoft-excel</v-icon>
              </v-list-item-icon>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </v-container>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "BulkLiquidHandling",
  data: () => {
    return {
      filtro: {
        year: "",
        month: "",
      },
    };
  },
  created: function () {
    this.ResetState();
    this.GetInicialState();
    this.filtro.year = this.CurrentYear;
    this.filtro.month = 0;
    this.getHistoryDocuments();
    this.getDocuments();
    /* 
    this.UpdateYears();
    console.log(this.Months);
    if (this.Years.length > 0) {
      this.filtro.year = this.Years[0].id;
    } else {
      this.filtro.year = 0;
    }
    this.getMonths();
     */
  },
  computed: {
    ...mapGetters({
      HistoricalMovements: "StateHistoricalMovements",
      HistoricalLoading: "StateHistoricalLoading",
      Years: "StateYears",
      Months: "StateMonths",
      Documents: "StateAnpDocuments",
      CurrentYear: "StateCurrentYear",
    }),
    MonthsTran() {
      let arr = [];
      if (this.Months != null) {
        this.Months.map((el) => {
          el.name = this.$t(el.lang_key);
          return el;
        });
        arr = this.Months;
      }
      return arr;
    },
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    },
  },
  methods: {
    ...mapActions([
      "GetAnpDocuments",
      "UpdateYears",
      "GetHistoricalMovements",
      "UpdateMonths",
      "ResetState",
      "GetInicialState",
    ]),
    async getDocuments() {
      await this.GetAnpDocuments();
    },

    async getHistoryDocuments() {
      console.log(this.filtro);
      await this.GetHistoricalMovements(this.filtro);
    },

    getMonths() {
      this.filtro.month = 0;
      this.UpdateMonths(this.filtro.year);
      this.getHistoryDocuments();
    },
  },
  filters: {
    formatDate(value) {
      if (value) {
        return value.year + "-" + value.month;
      }

      return "";
    },
  },
};
</script>
