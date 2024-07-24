<template>
  <div class="preSelectedResult text-center">
    <!-- <OtaCarousel v-bind:Imgs=items></OtaCarousel> -->
    <v-progress-circular
      :size="70"
      :width="7"
      color="blue"
      v-if="OfficesLoading"
      indeterminate
      class="mt-15"
    ></v-progress-circular>
    <div v-if="!OfficesLoading">
      <v-img
        :aspect-ratio="16 / 9"
        height="450"
        :src="require(`@/assets/images/${img}`)"
      ></v-img>
      <v-container class="x-small text-justify">
        <v-row no-gutters>
          <v-col cols="12" md="9">
            <h1 class="my-5">
              {{ $t(title) }}
            </h1>
            <p>{{ $t(text) }}</p>
            <v-data-table
              :headers="cTableHeaders"
              :items="Offices"
              class="elevation-1"
            >
              <template v-slot:[`item.actions`]="{ item }">
                <v-icon
                  v-if="item.terminal_page"
                  small
                  class="mr-2"
                  @click="goTerminal(item.id)"
                >
                  mdi-database-eye
                </v-icon>
              </template>
            </v-data-table>
          </v-col>
          <v-col cols="12" sm="6" md="3">
            <QuickFinder></QuickFinder>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import QuickFinder from "@/components/QuickFinder";

export default {
  name: "PreSelectedResult",
  props: ["id"],
  components: {
    QuickFinder,
  },
  data: () => {
    return {
      title: "",
      text: "",
      img: "",
      preSelected: 0,
    };
  },
  created() {
    this.inicialize();
    this.getOffices();
  },
  computed: {
    ...mapGetters({
      OfficesLoading: "StateOfficesLoading",
      Offices: "StateOffices",
    }),
    cTableHeaders() {
      const locale = this.$i18n.locale;
      const t = this.$t.bind(this);
      return [
        {
          text: t(`preSelectedResult.table.region`, locale),
          value: "region",
        },
        {
          text: t(`preSelectedResult.table.terminals`, locale),
          value: "terminal",
        },
        {
          text: t(``, locale),
          value: "actions",
        },
      ];
    },
  },
  methods: {
    ...mapActions(["GetOffices"]),
    inicialize: function () {
      switch (parseInt(this.id)) {
        case 1: {
          this.title = "preSelectedResult.petroleumTitle";
          this.text = "preSelectedResult.petroleumText";
          this.img = "Oil_landpage.jpg";
          this.preSelected = 1;
          break;
        }
        case 2: {
          this.title = "preSelectedResult.chemicalTitle";
          this.text = "preSelectedResult.chemicalText";
          this.img = "Chemical_landpage.jpg";
          this.preSelected = 2;
          break;
        }
        case 3: {
          this.title = "preSelectedResult.gasTitle";
          this.text = "preSelectedResult.gasText";
          this.img = "Gas_landpage.jpg";
          this.preSelected = 3;
          break;
        }
        case 4: {
          this.title = "preSelectedResult.otherTitle";
          this.text = "preSelectedResult.otherText";
          this.img = "Others.jpg";
          this.preSelected = 4;
          break;
        }
      }
    },
    goTerminal: function (id) {
      this.$router.push("/TerminalPage/" + id);
    },
    async getOffices() {
      let data = {};
      data.preSelected = this.preSelected;
      await this.GetOffices(data);
    },
  },
  watch: {
    id: function () {
      this.inicialize();
      this.getOffices();
    },
  },
};
</script>
