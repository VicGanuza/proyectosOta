<template>
  <div>
    <v-img
      :aspect-ratio="16/9"
      height="450"
      :src="require(`@/assets/images/offices/${Data.officeImg}`)"
    ></v-img>
    <v-container class="text-justify">
      <h2>{{ $t(Title) }}</h2>
      <h1>{{ Data.name }}</h1>
      <v-divider class="my-2"></v-divider>
      <v-row class="my-2">
        <v-col cols="12" md="6">
          <p>
            <span v-if="Data.address">
              {{Data.address}}<br/>
            </span>
            <span v-if="Data.city">
              {{Data.city}}<br/>
            </span>
            <span v-if="Data.region">
              {{Data.region}}<br/>
            </span>
            {{$t(Location)}}
          </p>
          <p>
            <span v-if="Data.phone">
              <v-icon small class="mr-2">mdi-phone-in-talk</v-icon>
              {{Data.phone}}
              <br/>
            </span>
            <span v-if="Data.fax">
              <v-icon small class="mr-2">mdi-fax</v-icon>
              {{Data.fax}}
              <br/>
            </span>
            <span v-if="Data.email">
              <v-icon small class="mr-2">mdi-email-outline</v-icon>
              <a :href="`mailto:${Data.email}`">{{Data.email}}</a>
              <br/>
            </span>
            <span>
              <v-icon small class="mr-2">mdi-web</v-icon>
              <a href="https://www.otamerica.com">www.otamerica.com</a>
              <br/>
            </span>
            <span v-if="Data.terminal_page">
              <v-icon small class="mr-2">mdi-database-eye</v-icon>
              <router-link :to="`/TerminalPage/${Data.id}`" target='_blank'>{{$t('terminalPage.label')}}</router-link>
            </span>
          </p>
          <p v-for="item in Data.personal" :key="item.id">
            {{$t('positions.'+item.lang_key)}}:<br/>
            {{item.name}}<br/>
            <span v-if="item.email">
              <v-icon small class="mr-2">mdi-email-outline</v-icon>
              <a :href="`mailto:${item.email}`">{{item.email}}</a>
            </span>
          </p>
          <div v-if="(Data.location_id === 2)">
            <p>
              {{$t('positions.dataManagerDpo')}}:<br/>
              Dario Di Luca
            </p>
            <p>
              {{$t('positions.communicationsCoordinator')}}:<br/>
              Mariana Chodera
            </p>
          </div>
          <p>
            {{$t('gpsCoordinates')}}:<br/>
            {{Data.gps_coordinates}}
          </p>
        </v-col>
        <v-col cols="12" md="6">
          <a :href="`${TerminalGoogleRoute}`" target="_blank">{{ $t('routePlanner') }}</a>
          <p class="mt-4">
            {{$t('localTime')}}: {{Data.localTime}} hs.
          </p>
          <ul class="my-4">
            <li v-if="Data.area_plan">
              <a :href="`${appPath}fileDownload.php?name=${Data.area_plan}`" target="_blank">{{ $t('areaPlan') }}</a>
              <!-- <a :href="`https://otamerica.com/files/${Data.area_plan}`" target="_blank">{{ $t('areaPlan') }}</a> -->
            </li>
            <li v-if="Data.site_plan">
              <a :href="`${appPath}fileDownload.php?name=${Data.site_plan}`" target="_blank">{{ $t('sitePlan') }}</a>
              <!-- <a :href="`https://otamerica.com/files/${Data.site_plan}`" target="_blank">{{ $t('sitePlan') }}</a> -->
            </li>
            <li v-if="Data.railway_map">
              <a :href="`${appPath}fileDownload.php?name=${Data.railway_map}`" target="_blank">{{ $t('railwayMap') }}</a>
              <!-- <a :href="`https://otamerica.com/files/${Data.railway_map}`" target="_blank">{{ $t('railwayMap') }}</a> -->
            </li>
          </ul>
          <div v-if="Data.products.length > 0" class="my-5">
            {{$t('terminalPage.products')}}:
            <ul>
              <li v-for="p in Data.products" :key="p.id">
                {{$t('products.'+p.lang_key)}}
              </li>
            </ul>
          </div>
          <div v-if="Data.documents.length > 0" class="my-5">
            <ul>
              <li v-for="d in Data.documents" :key="d.id">
                <a :href="`${appPath}fileDownload.php?name=${d.url}`" target="_blank">{{ d.name }}</a>
                <!-- <a :href="`https://otamerica.com/files/${d.url}`" target="_blank">{{ d.name }}</a> -->
              </li>
            </ul>
          </div>
          <div v-if="Data.certifications.length > 0" class="my-5">
            {{$t('certification')}}:
            <ul>
              <li v-for="c in Data.certifications" :key="c.id">
                <a :href="`${appPath}fileDownload.php?name=${c.url}`" target="_blank">{{ c.name }}</a>
                <!-- <a :href="`https://otamerica.com/files/${c.url}`" target="_blank">{{ c.name }}</a> -->
              </li>
            </ul>
          </div>
          <div v-if="Data.public_access.length > 0">
            <label>{{ $t('publicAccess') }}:</label>
            <ul>
              <li v-for="pa in Data.public_access"
                  :key="pa.id">
                <a v-if="!pa.inter_page" :href="`${pa.url}`"  target="_blank">{{ $t(pa.name) }}</a>
                <router-link v-else :to="`../${pa.url}`">{{ $t(pa.name) }}</router-link>
              </li>
            </ul>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
  name: "OfficeComponent",
  props: ['Id',
  'Title',
  'Location',
  'TerminalGoogleRoute',
  'Data'],
  computed: {
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    } 
 }
}
</script>