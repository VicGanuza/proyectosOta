<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="require('@/assets/images/Responsability.jpg')"
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("responsibility.title") }}
      </h1>
      <p>{{ $t("responsibility.p") }}</p>
      <v-row>
        <v-col cols="12" md="6" lg="3">
          <v-card class="mx-auto my-4">
            <v-img
              :src="require('@/assets/images/Hsse_page.jpeg')"
              height="250px"
            >
            </v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("menu.responsibility.submenu.hsse") }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn color="blue" text to="/hsse">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <v-card class="mx-auto my-4">
            <v-img
              :src="
                require('@/assets/images/image_tank-storage-construction2_1920px.jpg')
              "
              height="250px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("menu.responsibility.submenu.corporateGovernance") }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn color="blue" text to="/corporateGovernanceCompliance">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <v-card class="mx-auto my-4">
            <v-img
              :src="
                require('@/assets/images/Oiltanking_South-America_Brazil_Vitoria_Tanks_2015-02-04_5.jpg')
              "
              height="250px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("menu.responsibility.submenu.sustainableGrowth") }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn color="blue" text to="/sustainableGrowth">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <v-card class="mx-auto my-4">
            <v-img src="@/assets/images/pordosol.png" height="250px"></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("menu.responsibility.submenu.environmentalProtection") }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn color="blue" text to="/environmentalProtection">
                {{ $t("more") }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="6" lg="3">
          <v-card class="mx-auto my-4">
            <v-img
              :src="require('@/assets/images/Responsability-Our Employees.jpg')"
              height="250px"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t("menu.responsibility.submenu.ourEmployees") }}
            </v-card-subtitle>
            <v-card-actions>
              <v-btn color="blue" text to="/ourEmployees">
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
