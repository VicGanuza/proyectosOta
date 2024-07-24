<template>
  <div class="quickFinder">
    <v-img
      :aspect-ratio="16/9"
      height="450"
      src="@/assets/images/image_ot-brazil-vitoria_tanks6_1920px.jpg"
    ></v-img>
    <v-container class="text-justify">
      <h3 class="blue--text text--accent-4 my-5">
        {{ $t( 'quickfinderResults.title' ) }}
      </h3>
      <p class="body-1">{{ $t('quickfinderResults.text') }}</p>
      <v-container class="lighten-5">
        <v-row
          class='mb-6'
          no-gutters
        >
          <v-col>
            <v-text-field v-model="nombre" :label="$t('quickfinderResults.companyName')" class="pa-2"></v-text-field>
          </v-col>
          <v-col>
            <v-select
              class="pa-2"
              :items="LocationsTran"
              :label="$t('locations.all')"
              v-model="location"
              item-text="name"
              item-value="id"
              :loading="LocationLoading"
              :disabled="LocationLoading"
              return-object
              single-line
              @change="getOffices()"
            ></v-select>
          </v-col>
          <v-col>
            <v-select
              class="pa-2"
              :items="BusinessAreasTran"
              :label="$t('businessAreas.all')"
              v-model="business_area"
              item-text="name"
              item-value="id"
              :loading="BusinessAreaLoading"
              :disabled="BusinessAreaLoading"
              return-object
              single-line
              @change="getOffices()"
            ></v-select>
          </v-col>
        </v-row>
        <v-row
          class='mb-6'
          no-gutters
        >
          <v-col>
            <v-select
              class="pa-2"
              :items="ProductsTran"
              :label="$t('products.all')"
              v-model="product"
              item-text="name"
              item-value="id"
              :loading="ProductLoading"
              :disabled="ProductLoading"
              return-object
              single-line
              @change="getOffices()"
            ></v-select>
          </v-col>
          <v-col>
            <v-select
              class="pa-2"
              :items="AccessTypesTran"
              :label="$t('accessTypes.all')"
              v-model="access_type"
              item-text="name"
              item-value="id"
              :loading="AccessTypeLoading"
              :disabled="AccessTypeLoading"
              return-object
              single-line
              @change="getOffices()"
            ></v-select>
          </v-col>
          <v-col>
          </v-col>
        </v-row>
        <v-data-table
          v-if="Offices.length > 0 || OfficesLoading"
          :headers="cTableHeaders"
          :items="Offices"
          @click:row="handleClick"
          :loading="OfficesLoading"
          class="elevation-1"
        >
          <template v-slot:[`item.regionField`]="{ item }">
            {{$t(item.regionField)}},
            <div>{{item.region}}</div>
          </template>
          <template v-slot:[`item.companyTerminal`]="{ item }">
            {{item.name}},
            <div>{{$t(item.companyTerminal)}}</div>
            <div v-if="item.terminalPage">
              <router-link :to="`/TerminalPage/${item.id}`">{{$t('terminalPage.label')}}</router-link>
            </div>
          </template>
          <template v-slot:[`item.products`]="{ item }">
            <span v-for="p in item.products" :key="p.lang_key">
               {{$t('products.'+p.lang_key)}}, 
            </span>
          </template>
          <template v-slot:[`item.actions`]="{ item }">
            <v-icon
            v-if="item.terminalPage"
              small
              class="mr-2"
              @click="goTerminal(item.id)"
            >
              mdi-database-eye
            </v-icon>
          </template>
         
        </v-data-table>
        <div v-else>
          {{$t('messages.noSearchResult')}}
        </div>
      </v-container>
    </v-container>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  name: "QuickfinderResults",
  data: () => {
    return {
        nombre:'',
        location:{},
        business_area:{},
        product:{},
        access_type:{},
    }
  },
  created(){       
    this.GetLocations();
    this.GetBusinessAreas();
    this.GetProducts();
    this.GetAccessTypes();
    this.getOffices();
  },
  computed: {
    ...mapGetters(
      { OfficesLoading: "StateOfficesLoading", 
        Offices: "StateOffices", 
        Locations: "StateLocations",
        LocationLoading: "StateLocationLoading",
        BusinessAreas: "StateBusinessAreas",
        BusinessAreaLoading: "StateBusinessAreaLoading",
        Products: "StateProducts",
        ProductLoading: "StateProductLoading",
        AccessTypes: "StateAccessTypes",
        AccessTypeLoading: "StateAccessTypeLoading",
      }),
    cTableHeaders () {
      const locale = this.$i18n.locale
      const t = this.$t.bind(this)
      return [
        {
          text: t(`quickfinderResults.tableHeader.region`, locale),
          align: 'start',
          value: 'regionField'
        }, {
          text: t(`quickfinderResults.tableHeader.companyTerminal`, locale),
          value: 'companyTerminal'
        }, {
          text: t(`quickfinderResults.tableHeader.products`, locale),
          value: 'products'
        }, {
          text: t(``, locale),
          value: 'actions', 
          sortable: false
        }
      ]
    },
    LocationsTran(){
      this.Locations.map((el) => {
        el.name = this.$t('locations.'+el.lang_key);
        return el;
      });
      return this.Locations;
    },
    BusinessAreasTran(){
      this.BusinessAreas.map((el) => {
        el.name = this.$t('businessAreas.'+el.lang_key);
        return el;
      });
      return this.BusinessAreas;
    },
    ProductsTran(){
      this.Products.map((el) => {
        el.name = this.$t('products.'+el.lang_key);
        return el;
      });
      return this.Products;
    },
    AccessTypesTran(){
      this.AccessTypes.map((el) => {
        el.name = this.$t('accessTypes.'+el.lang_key);
        return el;
      });
      return this.AccessTypes;
    },
  },
  methods: {
    ...mapActions([ "GetOffices", "GetLocations", "GetBusinessAreas", "GetProducts", "GetAccessTypes"]),
    goTerminal: function(id) {
      this.$router.push('/TerminalPage/'+id);
    },
    handleClick(row) {
      this.$router.push('/OfficePage/'+row.id);
    },
    async getOffices() {
      let data= {};
      if (this.nombre != '') {
        data.nombre = this.nombre;
      }
      if (this.location != {} && this.location.id != 0) {
        data.location = this.location.id;
      }
      if (this.business_area != {} && this.business_area.id != 0) {
        data.business_area = this.business_area.id;
      }
      if (this.access_type != {} && this.access_type.id != 0) {
        data.access_type = this.access_type.id;
      }
      if (this.product != {} && this.product.id != 0) {
        data.product = this.product.id;
      }
      await this.GetOffices(data);
    }
  }
}
</script>