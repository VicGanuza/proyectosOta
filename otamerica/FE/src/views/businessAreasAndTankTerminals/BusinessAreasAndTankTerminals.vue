<template>
  <div class="businessAreas">
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/DSC0441.jpg"
    ></v-img>
    <v-container class="text-justify">
      <v-row>
        <v-col>
          <h1 class="my-5">
            {{ $t( 'businessAreasAndTankTerminals.title' ) }}
          </h1>
          <p>{{ $t('businessAreasAndTankTerminals.text') }}</p>
        </v-col>
        <!-- <v-col
          cols="3">
          <QuickFinder></QuickFinder>
        </v-col> -->
      </v-row>
      <v-row>
        <v-col cols="12" md="6" lg="3">
          <v-card
            class="mx-auto" 
          >
            <v-img
              src="@/assets/images/Chemical.jpg"
              height="250"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t('menu.businessAreas.submenu.chemicalStorage') }}
            </v-card-subtitle>

            <v-card-actions>
              <v-btn
                color="blue"
                text
                to="/PreSelectedResult/2"
              >
                {{ $t('ourTerminals') }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <v-card
            class="mx-auto"
          >
            <v-img
              src="@/assets/images/Gas.jpg"
              height="250">
            </v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t('menu.businessAreas.submenu.gasStorage') }}
            </v-card-subtitle>

            <v-card-actions>
              <v-btn
                color="blue"
                text
                to="/PreSelectedResult/3"
              >
                {{ $t('ourTerminals') }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3" >
          <v-card
            class="mx-auto"
          >
            <v-img
              src="@/assets/images/Oil.jpg"
              height="250"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t('menu.businessAreas.submenu.oilStorage') }}
            </v-card-subtitle>

            <v-card-actions>
              <v-btn
                color="blue"
                text
                to="/PreSelectedResult/1"
              >
                {{ $t('ourTerminals') }}
              </v-btn>

              <v-spacer></v-spacer>
            </v-card-actions>
          </v-card>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <v-card
            class="mx-auto"
          >
            <v-img
              src="@/assets/images/Others.jpg"
              height="250"
            ></v-img>

            <v-card-subtitle class="blue--text font-weight-bold text--accent-4">
              {{ $t('menu.businessAreas.submenu.otherLiquidsStorage') }}
            </v-card-subtitle>

            <v-card-actions>
              <v-btn
                color="blue"
                text
                to="/PreSelectedResult/4"
              >
                {{ $t('ourTerminals') }}
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
//import QuickFinder from '@/components/QuickFinder';

export default {
  name: 'BusinessAreasAndTankTerminals',
  components: {
   // QuickFinder,
  }, 
}
</script>