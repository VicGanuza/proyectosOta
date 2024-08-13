<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="
        require('@/assets/images/image_tank-storage-construction2_1920px.jpg')
      "
    ></v-img>
    <v-container class="text-justify">
      <h1>
        {{ $t("strategicActionAreas.title") }}
      </h1>
      <p>{{ $t("strategicActionAreas.p") }}</p>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.ourSustainabilityCommitment") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Commitment.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p2") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.responsibleCorporateGovernance") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Responsible.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p3") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.sustainableGrowth") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Growth.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p4") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.environmentalProtection") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Environment.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p5") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.ourEmployees") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Employees.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p6") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.occupationalHealthSafety") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Safety.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p7") }}</p>
        </v-col>
      </v-row>
      <p class="font-weight-bold">
        {{ $t("strategicActionAreas.corporateCitizenship") }}
      </p>
      <v-row>
        <v-col cols="1">
          <v-img
            width="70"
            :src="require('@/assets/icons/Citizenship.png')"
            class=""
          ></v-img>
        </v-col>
        <v-col cols="11">
          <p>{{ $t("strategicActionAreas.p8") }}</p>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
