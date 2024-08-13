<template>
  <div class="home">
    <OtaCarousel v-bind:Imgs="Items"></OtaCarousel>
    <v-container class="text-justify">
      <h1>
        {{ $t("home.title") }}
      </h1>
      <h2 class="mb-4">{{ $t("home.subtitle") }}</h2>
      <v-row>
        <v-col cols="12" md="4">
          <p>
            <router-link to="/PreSelectedResult/2" class="link-grey">
              <v-icon color="blue">mdi-flask-outline</v-icon>
              {{ $t("menu.businessAreas.submenu.chemicalStorage") }}
            </router-link>
          </p>
          <p>
            <router-link to="/PreSelectedResult/3" class="link-grey">
              <v-icon color="blue">mdi-fire-circle</v-icon>
              {{ $t("menu.businessAreas.submenu.gasStorage") }}
            </router-link>
          </p>
          <p>
            <router-link to="/PreSelectedResult/1" class="link-grey">
              <v-icon color="blue">mdi-barrel</v-icon>
              {{ $t("menu.businessAreas.submenu.oilStorage") }}
            </router-link>
          </p>
          <p>
            <router-link to="/PreSelectedResult/4" class="link-grey">
              <v-icon color="blue">mdi-water</v-icon>
              {{ $t("menu.businessAreas.submenu.otherLiquidsStorage") }}
            </router-link>
          </p>
        </v-col>
        <v-col cols="12" md="8">
          <div class="text-center">
            <v-progress-circular
              :size="70"
              :width="7"
              color="blue"
              v-if="FactsLoading"
              indeterminate
            ></v-progress-circular>
          </div>
          <v-row class="m-facts" v-if="!FactsLoading">
            <v-col align="center" justify="center">
              <v-img
                :aspect-ratio="1"
                max-width="75"
                :src="require('@/assets/icons/fact-01.png')"
              ></v-img>
              <div class="number-counter">
                {{ Facts.terminales }}
              </div>
              <p>
                {{ $t("facts.terminals", { locations: Facts.location_total }) }}
              </p>
            </v-col>
            <v-col align="center" justify="center">
              <v-img
                :aspect-ratio="1"
                max-width="75"
                :src="require('@/assets/icons/fact-02.png')"
              ></v-img>
              <div class="number-counter">
                {{ (Facts.cdm_total / 1000000).toFixed(1) }}
              </div>
              <p>
                {{ $t("facts.cdmStorage") }}
              </p>
            </v-col>
            <v-col align="center" justify="center">
              <v-img
                :aspect-ratio="1"
                max-width="75"
                :src="require('@/assets/icons/fact-03.png')"
              ></v-img>
              <div class="number-counter">
                {{ Facts.dwt_total }}
              </div>
              <p>
                {{ $t("facts.dwtStorage") }}
              </p>
            </v-col>
            <v-col align="center" justify="center">
              <v-img
                :aspect-ratio="1"
                max-width="75"
                :src="require('@/assets/icons/fact-04.png')"
              ></v-img>
              <div class="number-counter">
                {{ Facts.employees }}
              </div>
              <p>
                {{ $t("facts.employees") }}
              </p>
            </v-col>
          </v-row>
          <v-row class="m-facts">
            <small>({{ $t("facts.ref") }})</small>
          </v-row>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="6">
          <v-divider></v-divider>
          <video class="video" autoplay loop controls muted>
            <source
              :src="require('@/assets/VideoOiltanking-Otamerica-10.11.23.mp4')"
              type="video/mp4"
              class="source"
            />
          </video>
        </v-col>
        <v-col cols="12" md="6">
          <v-divider></v-divider>
          <h3 class="my-3 blue--text text--accent-4 w-700">
            {{ $t("menu.responsibility.title") }}
          </h3>
          <p>
            {{ $t("responsibility.description") }}
            <span class="ml-3">
              <v-icon small color="blue" class="mr-1">mdi-play</v-icon>
              <router-link to="/responsibility">{{ $t("more") }}</router-link>
            </span>
          </p>
          <v-divider></v-divider>
          <QuickFinder></QuickFinder>
        </v-col>
      </v-row>
      <v-divider></v-divider>
      <v-row class="mt-2">
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_ar_spanish_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_br_portuguese_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_co_spanish_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_mx_english_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_pa_spanish_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
        <v-col cols="12" md="2" sm="2">
          <v-img
            :src="
              require('@/assets/images/certificates/otamerica_pe_spanish_2023_certification_badge.png')
            "
          ></v-img>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
// @ is an alias to /src
import { mapGetters, mapActions } from "vuex";
import OtaCarousel from "@/components/OtaCarousel";
import QuickFinder from "@/components/QuickFinder";

export default {
  name: "HomeView",
  components: {
    OtaCarousel,
    QuickFinder,
  },
  created() {
    this.ResetStateFacts();
    this.getOfficesFacts();
  },
  computed: {
    ...mapGetters({ FactsLoading: "StateFactsLoading", Facts: "StateFacts" }),
    Items() {
      return [
        {
          src: "AboutUs01.jpg",
          title: "carousel.home.img1.title",
          text: "carousel.home.img1.description",
          link: "/otamericaAsTank",
        },
        {
          src: "DSC0441.jpg",
          title: "carousel.home.img2.title",
          text: "carousel.home.img2.description",
          link: "/businessAreasAndTankTerminals",
        },
        {
          src: "DSC0405 03.jpg",
          title: "carousel.home.img3.title",
          text: "carousel.home.img3.description",
          link: "/hsse",
        },
      ];
    },
  },
  methods: {
    ...mapActions(["GetFacts", "ResetStateFacts"]),
    async getOfficesFacts() {
      await this.GetFacts();
    },
  },
};
</script>
