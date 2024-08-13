import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import AboutView from "@/views/aboutUs/AboutView.vue";
import OtamericaAsTank from "@/views/aboutUs/OtamericaAsTank.vue";
import StrategicApproach from "@/views/aboutUs/StrategicApproach.vue";
import CorporateMovies from "@/views/aboutUs/CorporateMovies.vue";
import BusinessAreasAndTankTerminals from "@/views/businessAreasAndTankTerminals/BusinessAreasAndTankTerminals.vue";
import PreSelectedResult from "@/views/businessAreasAndTankTerminals/PreSelectedResult.vue";
import ResponsibilityView from "@/views/responsibility/ResponsibilityView.vue";
import HsseView from "@/views/responsibility/HsseView.vue";
import CorporateGovernanceCompliance from "@/views/responsibility/CorporateGovernanceCompliance.vue";
import SustainableGrowth from "@/views/responsibility/SustainableGrowth.vue";
import EnvironmentalProtection from "@/views/responsibility/EnvironmentalProtection.vue";
import OurEmployees from "@/views/responsibility/OurEmployees.vue";
import HssePolicy from "@/views/responsibility/HssePolicy.vue";
import HealthAndSafety from "@/views/responsibility/HealthAndSafety.vue";
import SecurityView from "@/views/responsibility/SecurityView.vue";
import SustainabilityStrategy from "@/views/responsibility/SustainabilityStrategy.vue";
import StrategicActionAreas from "@/views/responsibility/StrategicActionAreas.vue";
import EthicsAndCompliance from "@/views/responsibility/EthicsAndCompliance.vue";
import EsgReport from "@/views/responsibility/EsgReport.vue";
import JdpProgram from "@/views/career/JdpProgram.vue";
import NewsView from "@/views/NewsView.vue";
import OtamericaUnited from "@/views/news/OtamericaUnited.vue";
import GreatPlaceToWork from "@/views/news/GreatPlaceToWork.vue";
import QuickfinderResults from "@/views/QuickfinderResults.vue";
import OfficePage from "@/views/OfficePage.vue";
import TerminalPage from "@/views/TerminalPage.vue";
import ContentProvider from "@/views/ContentProvider.vue";
import RegulationsView from "@/views/RegulationsView.vue";
import BulkLiquidHandling from "@/views/BulkLiquidHandling.vue";
import PoliticsView from "@/views/PoliticsView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "About",
    component: AboutView,
  },
  {
    path: "/otamericaAsTank",
    name: "OtamericaAsTank",
    component: OtamericaAsTank,
  },
  {
    path: "/strategicApproach",
    name: "StrategicApproach",
    component: StrategicApproach,
  },
  {
    path: "/corporateMovies",
    name: "CorporateMovies",
    component: CorporateMovies,
  },
  {
    path: "/businessAreasAndTankTerminals",
    name: "BusinessAreasAndTanlTerminals",
    component: BusinessAreasAndTankTerminals,
  },
  {
    path: "/PreSelectedResult/:id",
    name: "PreSelectedResult",
    component: PreSelectedResult,
    props: true,
  },
  {
    path: "/responsibility",
    name: "ResponsibilityView",
    component: ResponsibilityView,
  },
  {
    path: "/hsse",
    name: "HsseView",
    component: HsseView,
  },
  {
    path: "/corporateGovernanceCompliance",
    name: "CorporateGovernanceCompliance",
    component: CorporateGovernanceCompliance,
  },
  {
    path: "/sustainableGrowth",
    name: "SustainableGrowth",
    component: SustainableGrowth,
  },
  {
    path: "/environmentalProtection",
    name: "EnvironmentalProtection",
    component: EnvironmentalProtection,
  },
  {
    path: "/ourEmployees",
    name: "OurEmployees",
    component: OurEmployees,
  },
  {
    path: "/hssePolicy",
    name: "HssePolicy",
    component: HssePolicy,
  },
  {
    path: "/healthAndSafety",
    name: "HealthAndSafety",
    component: HealthAndSafety,
  },
  {
    path: "/security",
    name: "SecurityView",
    component: SecurityView,
  },
  {
    path: "/sustainabilityStrategy",
    name: "SustainabilityStrategy",
    component: SustainabilityStrategy,
  },
  {
    path: "/strategicActionAreas",
    name: "StrategicActionAreas",
    component: StrategicActionAreas,
  },
  {
    path: "/ethicsAndCompliance",
    name: "EthicsAndCompliance",
    component: EthicsAndCompliance,
  },
  {
    path: "/esgReport",
    name: "EsgReport",
    component: EsgReport,
  },
  {
    path: "/jdpProgram",
    name: "JdpProgram",
    component: JdpProgram,
  },
  {
    path: "/news",
    name: "NewsView",
    component: NewsView,
  },
  {
    path: "/otamericaUnited",
    name: "OtamericaUnited",
    component: OtamericaUnited,
  },
  {
    path: "/greatPlaceToWork",
    name: "GreatPlaceToWork",
    component: GreatPlaceToWork,
  },
  {
    path: "/QuickfinderResults",
    name: "QuickfinderResults",
    component: QuickfinderResults,
    props: true,
  },
  {
    path: "/OfficePage/:id",
    name: "OfficePage",
    component: OfficePage,
    props: true,
  },
  {
    path: "/TerminalPage/:id",
    name: "TerminalPage",
    component: TerminalPage,
    props: true,
  },
  {
    path: "/contentProvider",
    name: "ContentProvider",
    component: ContentProvider,
  },
  {
    path: "/regulations",
    name: "RegulationsView",
    component: RegulationsView,
  },
  {
    path: "/bulkLiquidHandling",
    name: "BulkLiquidHandling",
    component: BulkLiquidHandling,
  },
  {
    path: "/politics",
    name: "PoliticsView",
    component: PoliticsView,
  },
];

const router = createRouter({
  /* mode: "hash",
  base: process.env.BASE_URL, */
  history: createWebHashHistory(process.env.BASE_URL),
  routes,
});

export default router;
