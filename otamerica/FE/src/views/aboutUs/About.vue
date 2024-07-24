<template>
  <div class="about">
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      src="@/assets/images/about/about_us_0.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("about.title") }}
      </h1>
      <h2 class="mb-4">{{ $t("about.subtitle") }}</h2>
      <v-row>
        <v-col cols="12" md="4">
          <v-card class="mx-auto">
            <v-img
              src="@/assets/images/about/about_us_1.jpg"
              height="200px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("about.company") }}
            </v-card-subtitle>
            <v-card-text>
              {{ $t("about.profile") }}
            </v-card-text>
            <v-card-actions>
              <v-btn color="blue" text to="/otamericaAsTank">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="4">
          <v-card class="mx-auto">
            <v-img
              src="@/assets/images/About Us-Strategic Approach.jpg"
              height="200px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("about.strategicApproach") }}
            </v-card-subtitle>
            <v-card-text>
              {{ $t("about.visionAndMission") }}
            </v-card-text>
            <v-card-actions>
              <v-btn color="blue" text to="/strategicApproach">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="4">
          <v-card class="mx-auto">
            <v-img
              src="@/assets/images/image_ot-germany-hamburg_operators_1920px.jpg"
              height="200px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("about.corporateMovies") }}
            </v-card-subtitle>
            <v-card-text>
              {{ $t("about.otaVideos") }}
            </v-card-text>
            <v-card-actions>
              <v-btn color="blue" text to="/corporateMovies">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
  name: "About",
};
</script>
