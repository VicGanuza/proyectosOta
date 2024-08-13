<template>
  <div>
    <v-img
      :aspect-ratio="16 / 9"
      height="450"
      :src="require(`@/assets/images/terminals/${Data.img}`)"
    ></v-img>
    <v-container class="text-justify">
      <h3>{{ $t("terminalFacts") }}</h3>
      <h1>{{ Name }}, {{ $t(Office) }}</h1>
      <v-row no-gutters>
        <v-col cols="12" lg="9">
          <v-tabs v-model="tab">
            <v-tab value="one">cbm</v-tab>
            <v-tab value="two">bbl</v-tab>
          </v-tabs>

          <v-card-text>
            <v-tabs-window v-model="tab">
              <v-tabs-window-item value="one">
                <v-card flat>
                  <v-card-text>
                    <v-row>
                      <v-col>
                        <div v-if="Data.tank_capacity">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankCapacity") }}
                          </label>
                          <p>{{ Data.tank_capacity.toLocaleString() }} cbm</p>
                        </div>
                        <div v-if="Data.tanks >= 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tanks") }}
                          </label>
                          <p>{{ Data.tanks }}</p>
                        </div>
                        <div v-if="TankTypes.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankTypes") }}
                          </label>
                          <p>
                            <span v-for="(value, key) in TankTypes" :key="key">
                              {{ $t("tankTypes." + value.lang_key) }}
                              <span v-if="key + 1 != TankTypes.length">, </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Data.tank_sizes_min">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankSizes") }}
                          </label>
                          <p>
                            {{ Data.tank_sizes_min.toLocaleString() }}
                            <span v-if="Data.tank_sizes_max">
                              -
                              {{ Data.tank_sizes_max.toLocaleString() }}
                            </span>
                            cbm
                          </p>
                        </div>
                      </v-col>
                      <v-col>
                        <div v-if="AccessTypes.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.accessTypes") }}
                          </label>
                          <p>
                            <span
                              v-for="(value, key) in AccessTypes"
                              :key="key"
                            >
                              {{ $t("accessTypes." + value.lang_key) }}
                              <span v-if="key + 1 != AccessTypes.length"
                                >,
                              </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Products.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.products") }}
                          </label>
                          <p>
                            <span v-for="(value, key) in Products" :key="key">
                              {{ $t("products." + value.lang_key) }}
                              <span v-if="key + 1 != Products.length">, </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Services">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.services") }}
                          </label>
                          <p v-if="$i18n.locale === 'en'">{{ Services.en }}</p>
                          <p v-if="$i18n.locale === 'es'">{{ Services.es }}</p>
                          <p v-if="$i18n.locale === 'pt'">{{ Services.pt }}</p>
                        </div>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-tabs-window-item>
              <v-tabs-window-item value="two">
                <v-card flat>
                  <v-card-text>
                    <v-row>
                      <v-col>
                        <div v-if="Data.tank_capacity">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankCapacity") }}
                          </label>
                          <p>
                            {{
                              Math.round(
                                Data.tank_capacity * 6.29
                              ).toLocaleString()
                            }}
                            bbl
                          </p>
                        </div>
                        <div v-if="Data.tanks >= 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tanks") }}
                          </label>
                          <p>{{ Data.tanks }}</p>
                        </div>
                        <div v-if="TankTypes.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankTypes") }}
                          </label>
                          <p>
                            <span v-for="(value, key) in TankTypes" :key="key">
                              {{ $t("tankTypes." + value.lang_key) }}
                              <span v-if="key + 1 != TankTypes.length">, </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Data.tank_sizes_min">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.tankSizes") }}
                          </label>
                          <p>
                            {{
                              Math.round(
                                Data.tank_sizes_min * 6.29
                              ).toLocaleString()
                            }}
                            <span v-if="Data.tank_sizes_max">
                              -
                              {{
                                Math.round(
                                  Data.tank_sizes_max * 6.29
                                ).toLocaleString()
                              }}
                            </span>
                            bbl
                          </p>
                        </div>
                      </v-col>
                      <v-col>
                        <div v-if="AccessTypes.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.accessTypes") }}
                          </label>
                          <p>
                            <span
                              v-for="(value, key) in AccessTypes"
                              :key="key"
                            >
                              {{ $t("accessTypes." + value.lang_key) }}
                              <span v-if="key + 1 != AccessTypes.length"
                                >,
                              </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Products.length > 0">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.products") }}
                          </label>
                          <p>
                            <span v-for="(value, key) in Products" :key="key">
                              {{ $t("products." + value.lang_key) }}
                              <span v-if="key + 1 != Products.length">, </span>
                            </span>
                          </p>
                        </div>
                        <div v-if="Services != ''">
                          <label class="blue--text text--accent-4">
                            {{ $t("terminalPage.services") }}
                          </label>
                          <p v-if="$i18n.locale === 'en'">{{ Services.en }}</p>
                          <p v-if="$i18n.locale === 'es'">{{ Services.es }}</p>
                          <p v-if="$i18n.locale === 'pt'">{{ Services.pt }}</p>
                        </div>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-tabs-window-item>
            </v-tabs-window>
          </v-card-text>
          <!-- <v-tabs>
            <v-tab> cbm </v-tab>
            <v-tab> bbl </v-tab>
            <v-tab-item>
              <v-card flat>
                <v-card-text>
                  <v-row>
                    <v-col>
                      <div v-if="Data.tank_capacity">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankCapacity") }}
                        </label>
                        <p>{{ Data.tank_capacity.toLocaleString() }} cbm</p>
                      </div>
                      <div v-if="Data.tanks >= 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tanks") }}
                        </label>
                        <p>{{ Data.tanks }}</p>
                      </div>
                      <div v-if="TankTypes.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankTypes") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in TankTypes" :key="key">
                            {{ $t("tankTypes." + value.lang_key) }}
                            <span v-if="key + 1 != TankTypes.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Data.tank_sizes_min">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankSizes") }}
                        </label>
                        <p>
                          {{ Data.tank_sizes_min.toLocaleString() }}
                          <span v-if="Data.tank_sizes_max">
                            -
                            {{ Data.tank_sizes_max.toLocaleString() }}
                          </span>
                          cbm
                        </p>
                      </div>
                    </v-col>
                    <v-col>
                      <div v-if="AccessTypes.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.accessTypes") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in AccessTypes" :key="key">
                            {{ $t("accessTypes." + value.lang_key) }}
                            <span v-if="key + 1 != AccessTypes.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Products.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.products") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in Products" :key="key">
                            {{ $t("products." + value.lang_key) }}
                            <span v-if="key + 1 != Products.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Services">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.services") }}
                        </label>
                        <p v-if="$i18n.locale === 'en'">{{ Services.en }}</p>
                        <p v-if="$i18n.locale === 'es'">{{ Services.es }}</p>
                        <p v-else>{{ Services.pt }}</p>
                      </div>
                    </v-col>
                  </v-row>
                </v-card-text>
              </v-card>
            </v-tab-item>
            <v-tab-item>
              <v-card flat>
                <v-card-text>
                  <v-row>
                    <v-col>
                      <div v-if="Data.tank_capacity">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankCapacity") }}
                        </label>
                        <p>
                          {{
                            Math.round(
                              Data.tank_capacity * 6.29
                            ).toLocaleString()
                          }}
                          bbl
                        </p>
                      </div>
                      <div v-if="Data.tanks >= 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tanks") }}
                        </label>
                        <p>{{ Data.tanks }}</p>
                      </div>
                      <div v-if="TankTypes.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankTypes") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in TankTypes" :key="key">
                            {{ $t("tankTypes." + value.lang_key) }}
                            <span v-if="key + 1 != TankTypes.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Data.tank_sizes_min">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.tankSizes") }}
                        </label>
                        <p>
                          {{
                            Math.round(
                              Data.tank_sizes_min * 6.29
                            ).toLocaleString()
                          }}
                          <span v-if="Data.tank_sizes_max">
                            -
                            {{
                              Math.round(
                                Data.tank_sizes_max * 6.29
                              ).toLocaleString()
                            }}
                          </span>
                          bbl
                        </p>
                      </div>
                    </v-col>
                    <v-col>
                      <div v-if="AccessTypes.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.accessTypes") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in AccessTypes" :key="key">
                            {{ $t("accessTypes." + value.lang_key) }}
                            <span v-if="key + 1 != AccessTypes.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Products.length > 0">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.products") }}
                        </label>
                        <p>
                          <span v-for="(value, key) in Products" :key="key">
                            {{ $t("products." + value.lang_key) }}
                            <span v-if="key + 1 != Products.length">, </span>
                          </span>
                        </p>
                      </div>
                      <div v-if="Services != ''">
                        <label class="blue--text text--accent-4">
                          {{ $t("terminalPage.services") }}
                        </label>
                        <p v-if="$i18n.locale === 'en'">{{ Services.en }}</p>
                        <p v-if="$i18n.locale === 'es'">{{ Services.es }}</p>
                        <p v-else>{{ Services.pt }}</p>
                      </div>
                    </v-col>
                  </v-row>
                </v-card-text>
              </v-card>
            </v-tab-item>
          </v-tabs>-->
          <v-row v-if="Data.marimeFacilities.length > 0" class="my-4">
            <label class="w-25 blue--text text--accent-4">
              {{ $t("terminalPage.maritimeFacility") }}
            </label>
            <ul>
              <li v-for="item in Data.marimeFacilities" :key="item.id">
                <span class="font-weight-bold">{{ $t(item.name) }} </span>
                <span v-if="item.dwt">
                  - <span class="blue--text text--accent-4">DWT:</span>
                  {{ item.dwt.toLocaleString() }} tons
                </span>
                <span v-if="item.displacement">
                  ({{ $t("maritimeFacility.displacement") }})
                </span>
                <span v-if="item.draught">
                  -
                  <span class="blue--text text--accent-4">
                    {{ $t("terminalPage.draught") }}:
                  </span>
                  {{ item.draught.toLocaleString() }} m
                </span>
                <span v-if="item.loa">
                  -
                  <span class="blue--text text--accent-4">
                    {{ $t("terminalPage.loa") }}:
                  </span>
                  {{ item.loa.toLocaleString() }} m
                </span>
              </li>
            </ul>
          </v-row>
          <v-row v-if="Data.id === 3" class="my-4">
            <router-link to="/regulations">
              {{ $t("regulations.title") }}
            </router-link>
          </v-row>
          <div v-if="Data.terminal_data">
            <v-icon class="mr-1">mdi-file-pdf-box</v-icon>
            <a
              :href="`${appPath}fileDownload.php?name=${Data.terminal_data}`"
              target="_blank"
            >
              {{ $t("downloadFactSheetPdf") }}
            </a>
          </div>
          <ul class="my-4">
            <li v-if="Data.area_plan">
              <a
                :href="`${appPath}fileDownload.php?name=${Data.area_plan}`"
                target="_blank"
              >
                {{ $t("areaPlan") }}
              </a>
            </li>
            <li v-if="Data.site_plan">
              <a
                :href="`${appPath}fileDownload.php?name=${Data.site_plan}`"
                target="_blank"
              >
                {{ $t("sitePlan") }}
              </a>
            </li>
            <li v-if="Data.railway_map">
              <a
                :href="`${appPath}fileDownload.php?name=${Data.railway_map}`"
                target="_blank"
              >
                {{ $t("railwayMap") }}
              </a>
            </li>
            <li v-if="Data.id === 17">
              <a
                :href="`${appPath}fileDownload.php?name=peru/doc-0020-lqs-politica-del-sig.pdf`"
                target="_blank"
              >
                {{ $t("integratedManagementSystemPolicy") }}
              </a>
            </li>
            <li v-if="Data.id === 19">
              <a
                :href="`${appPath}fileDownload.php?name=peru/1.-politica-del-sistema-integrado-de-gestion.pdf`"
                target="_blank"
              >
                {{ $t("integratedManagementSystemPolicy") }}
              </a>
            </li>
          </ul>
          <ul class="my-4">
            <li v-for="item in Data.documents" :key="item.name">
              <a
                :href="`${appPath}fileDownload.php?name=${item.url}`"
                target="_blank"
              >
                {{ $t(item.name) }}
              </a>
            </li>
          </ul>
          <div v-if="Data.public_access.length > 0">
            <label>{{ $t("publicAccess") }}:</label>
            <ul>
              <li v-for="pa in Data.public_access" :key="pa.name">
                <a v-if="!pa.inter_page" :href="`${pa.url}`" target="_blank">
                  {{ $t(pa.name) }}
                </a>
                <router-link v-else :to="`../${pa.url}`">
                  {{ $t(pa.name) }}
                </router-link>
              </li>
            </ul>
          </div>
          <div v-if="Data.certifications.length > 0">
            <label>{{ $t("certification") }}:</label>
            <ul>
              <li v-for="cert in Data.certifications" :key="cert.name">
                <a
                  :href="`${appPath}fileDownload.php?name=${cert.url}`"
                  target="_blank"
                >
                  {{ $t(cert.name) }}
                </a>
              </li>
            </ul>
          </div>
        </v-col>
        <v-col cols="12" md="6" lg="3">
          <div class="title blue--text">{{ $t("terminalContact") }}</div>
          <div class="m-contact">
            <p>
              <span v-if="Data.address">{{ Data.address }}<br /></span>
              <span v-if="Data.city">{{ Data.city }}<br /></span>
              <span v-if="Data.region">{{ Data.region }}<br /></span>
              {{ $t(Data.location) }}
            </p>
            <p>
              <span v-if="Data.phone">
                <v-icon small class="mr-2">mdi-phone-in-talk</v-icon>
                {{ Data.phone }}
                <br />
              </span>
              <span v-if="Data.fax">
                <v-icon small class="mr-2">mdi-fax</v-icon>
                {{ Data.fax }}
                <br />
              </span>
              <span v-if="Data.email">
                <v-icon small class="mr-2">mdi-email-outline</v-icon>
                <a :href="`mailto:${Data.email}`">{{ Data.email }}</a>
                <br />
              </span>
              <span>
                <v-icon small class="mr-2">mdi-web</v-icon>
                <a href="https://www.otamerica.com">www.otamerica.com</a>
                <br />
              </span>
            </p>
          </div>
          <div v-if="Data.personal">
            <div class="title blue--text">{{ $t("marketingContact") }}</div>
            <div class="m-contact">
              <p class="blue--text">
                {{ $t("positions." + Data.personal[0].lang_key) }}
              </p>
              <p>
                {{ Data.personal[0].name }}
              </p>
            </div>
          </div>
          <div v-if="Data.id === 9 || Data.id === 8">
            <div class="title blue--text">{{ $t("protectionData") }}</div>
            <div class="m-contact">
              <p class="blue--text">
                {{ $t("positions.dataManagerDpo") }}
              </p>
              <p>Dario Di Luca</p>
              <span>
                <v-icon small class="mr-2">mdi-email-outline</v-icon>
                <a :href="`mailto:brasil@otamerica.com`">
                  brasil@otamerica.com
                </a>
                <br />
              </span>
            </div>
            <div class="title blue--text">{{ $t("contactInformation") }}</div>
            <div class="m-contact">
              <p class="blue--text">
                {{ $t("positions.communicationsCoordinator") }}
              </p>
              <p>Mariana Chodera</p>
              <span>
                <v-icon small class="mr-2">mdi-email-outline</v-icon>
                <a :href="`mailto:mariana.chodera@otamerica.com`">
                  mariana.chodera@otamerica.com
                </a>
                <br />
              </span>
            </div>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
  name: "TerminalComponent",
  props: [
    "Id",
    "Name",
    "Office",
    "TankTypes",
    "Products",
    "AccessTypes",
    "Services",
    "Data",
  ],
  data: () => ({
    tab: null,
  }),
  computed: {
    appPath() {
      return process.env.VUE_APP_RUTA_API;
    },
  },
};
</script>
