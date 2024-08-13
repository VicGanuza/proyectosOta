<template>
  <div class="headerApp">
    <v-app-bar app>
      <v-btn icon @click.stop="drawer = !drawer" class="d-flex d-md-none">
        <v-icon>mdi-format-list-bulleted</v-icon>
      </v-btn>
      <a href="/" class="no-hover">
        <v-img
          :width="230"
          min-width="100"
          class="shrink mt-1"
          contain
          :src="require('../assets/logo-otamerica.png')"
        ></v-img>
      </a>

      <v-spacer></v-spacer>

      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon @click.stop="showLang = !showLang">
            <v-icon v-bind="attrs" v-on="on">mdi-web</v-icon>
            <!-- <flag :iso="$i18n.locale === 'en' ? 'us' : $i18n.locale === 'pt' ? 'br' : $i18n.locale" v-bind:squared=false />  -->
          </v-btn>
        </template>
        <span>{{ $t("languages") }}</span>
      </v-tooltip>
      <template v-slot:extension>
        <nav class="d-none d-md-flex">
          <ul class="menu">
            <li v-for="item in menusApp" :key="item.title">
              <router-link v-if="item.linkTo" :to="item.linkTo">
                {{ $t(item.title) }}
              </router-link>
              <a v-else :href="item.href" target="_blank">{{
                $t(item.title)
              }}</a>
              <ul v-if="item.submenu">
                <li v-for="subItem in item.submenu" :key="subItem.title">
                  <router-link v-if="subItem.linkTo" :to="subItem.linkTo">{{
                    $t(subItem.title)
                  }}</router-link>
                  <a v-else :href="subItem.href" target="_blank">{{
                    $t(subItem.title)
                  }}</a>
                  <ul v-if="subItem.submenu">
                    <li v-for="sI in subItem.submenu" :key="sI.title">
                      <router-link :to="sI.linkTo">{{
                        $t(sI.title)
                      }}</router-link>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </template>
    </v-app-bar>

    <v-navigation-drawer app v-model="drawer" temporary>
      <v-list>
        <v-list-group v-for="item in menusApp" :key="item.title">
          <template v-slot:activator="{ props }">
            <v-list-item v-bind="props" class="text-wrap">
              {{ $t(item.title) }}
            </v-list-item>
          </template>
          <v-list-item
            v-if="item.linkTo && item.linkTo != ''"
            :to="item.linkTo"
          >
            {{ $t(item.title) }}
          </v-list-item>
          <div v-for="subItem in item.submenu" :key="subItem.title">
            <v-list-group v-if="subItem.submenu">
              <template v-slot:activator="{ props }">
                <v-list-item v-bind="props" class="text-wrap">
                  {{ $t(subItem.title) }}
                </v-list-item>
              </template>

              <v-list-item v-if="subItem.linkTo != ''" :to="subItem.linkTo">
                {{ $t(subItem.title) }}
              </v-list-item>
            </v-list-group>
            <v-list-item v-else-if="subItem.linkTo" :to="subItem.linkTo">
              {{ $t(subItem.title) }}
            </v-list-item>
            <v-list-item v-else :href="subItem.href" target="_blank">
              {{ $t(subItem.title) }}
            </v-list-item>
          </div>
        </v-list-group>
      </v-list>
    </v-navigation-drawer>
    <v-navigation-drawer location="right" v-model="showLang" temporary>
      <v-list>
        <v-list-item
          v-for="item in languages"
          :key="item.title"
          @click="changeLocale(item.language)"
        >
          <template v-slot:prepend>
            <flag :iso="item.flag" v-bind:squared="false" />
          </template>
          <v-list-item-title>{{ $t(item.title) }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
import i18n from "@/plugins/i18n";

export default {
  name: "HeaderApp",
  data: () => ({
    drawer: null,
    showLang: null,
    langs: ["ja", "en"],
    languages: [
      { flag: "us", language: "en", title: "lang.english" },
      { flag: "es", language: "es", title: "lang.spanish" },
      { flag: "br", language: "pt", title: "lang.portuguese" },
    ],
    menusApp: [
      {
        title: "menu.aboutUs.title",
        linkTo: "/about",
        submenu: [
          {
            title: "menu.aboutUs.submenu.otamericaAsTank",
            linkTo: "/otamericaAsTank",
          },
          {
            title: "menu.aboutUs.submenu.strategicApproach",
            linkTo: "/strategicApproach",
          },
          /* {
            title: "menu.aboutUs.submenu.corporateMovies",
            linkTo: "/corporateMovies",
          }, */
        ],
      },
      {
        title: "menu.businessAreas.title",
        linkTo: "/businessAreasAndTankTerminals",
        submenu: [
          {
            title: "menu.businessAreas.submenu.chemicalStorage",
            linkTo: "/PreSelectedResult/2",
          },
          {
            title: "menu.businessAreas.submenu.gasStorage",
            linkTo: "/PreSelectedResult/3",
          },
          {
            title: "menu.businessAreas.submenu.oilStorage",
            linkTo: "/PreSelectedResult/1",
          },
          {
            title: "menu.businessAreas.submenu.otherLiquidsStorage",
            linkTo: "/PreSelectedResult/4",
          },
        ],
      },
      {
        title: "menu.responsibility.title",
        linkTo: "/responsibility",
        submenu: [
          {
            title: "menu.responsibility.submenu.hsse",
            linkTo: "/hsse",
            submenu: [
              {
                title: "menu.responsibility.submenu.hssePolicy",
                linkTo: "/hssePolicy",
              },
              {
                title: "menu.responsibility.submenu.healthAndSafety",
                linkTo: "/healthAndSafety",
              },
              {
                title: "menu.responsibility.submenu.security",
                linkTo: "/security",
              },
              {
                title: "menu.responsibility.submenu.environment",
                linkTo: "/environmentalProtection",
              },
            ],
          },
          {
            title: "menu.responsibility.submenu.corporateGovernance",
            linkTo: "/corporateGovernanceCompliance",
            submenu: [
              {
                title: "menu.responsibility.submenu.sustainabilityStrategy",
                linkTo: "/sustainabilityStrategy",
              },
              {
                title: "menu.responsibility.submenu.strategicActionAreas",
                linkTo: "/strategicActionAreas",
              },
              {
                title: "menu.responsibility.submenu.ethicsAndCompliance",
                linkTo: "/ethicsAndCompliance",
              },
            ],
          },
          {
            title: "menu.responsibility.submenu.sustainableGrowth",
            linkTo: "/sustainableGrowth",
            submenu: [
              {
                title: "menu.responsibility.submenu.esgReport",
                linkTo: "/esgReport",
              },
            ],
          },
          {
            title: "menu.responsibility.submenu.environmentalProtection",
            linkTo: "/environmentalProtection",
          },
          {
            title: "menu.responsibility.submenu.ourEmployees",
            linkTo: "/ourEmployees",
          },
        ],
      },
      {
        title: "menu.career.title",
        submenu: [
          {
            title: "menu.career.submenu.vacancies",
            href: "https://otamerica.bamboohr.com/jobs/",
          },
          { title: "menu.career.submenu.jdpProgram", linkTo: "/jdpProgram" },
        ],
      },
      {
        title: "menu.news.title",
        linkTo: "/news",
        /* submenu: [
        // { title: 'Puerto Rosales', linkTo: '/puertoRosales' },
        { title: 'Terminal Suape', linkTo: '/terminalSuape' },
        { title: 'menu.career.submenu.jdpProgram', href: 'https://grupociadetalentos.com/Oiltanking2023/' },
        ]*/
      },
      {
        title: "menu.contact.title",
        submenu: [
          {
            title: "menu.contact.submenu.latinAmericaContacts",
            linkTo: "/QuickfinderResults",
          },
          {
            title: "menu.contact.submenu.contentProvider",
            linkTo: "/contentProvider",
          },
        ],
      },
    ],
  }),
  methods: {
    changeLocale(locale) {
      i18n.global.locale = locale;
      this.showLang = !this.showLang;
      localStorage.setItem("lang", locale);
    },
  },
};
</script>
