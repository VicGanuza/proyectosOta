import Vue from "vue";
import VueRouter from "vue-router";
import Home from "@/views/Home.vue";
import About from "@/views/aboutUs/About.vue";
import QuickfinderResults from "@/views/QuickfinderResults";
import TerminalPage from "@/views/TerminalPage";
import BusinessAreasAndTankTerminals from "@/views/businessAreasAndTankTerminals/BusinessAreasAndTankTerminals";
import PreSelectedResult from "@/views/businessAreasAndTankTerminals/PreSelectedResult";
import OfficePage from "@/views/OfficePage";
import BulkLiquidHandling from "@/views/BulkLiquidHandling";
import Politics from "@/views/Politics";
import OtamericaAsTank from "@/views/aboutUs/OtamericaAsTank";
import StrategicApproach from "@/views/aboutUs/StrategicApproach";
import CorporateMovies from "@/views/aboutUs/CorporateMovies";
import Responsibility from "@/views/responsibility/Responsibility";
import Hsse from "@/views/responsibility/Hsse";
import CorporateGovernanceCompliance from "@/views/responsibility/CorporateGovernanceCompliance";
import SustainableGrowth from "@/views/responsibility/SustainableGrowth";
import EnvironmentalProtection from "@/views/responsibility/EnvironmentalProtection";
import OurEmployees from "@/views/responsibility/OurEmployees";
import HssePolicy from "@/views/responsibility/HssePolicy";
import HealthAndSafety from "@/views/responsibility/HealthAndSafety";
import Security from "@/views/responsibility/Security";
import SustainabilityStrategy from "@/views/responsibility/SustainabilityStrategy";
import StrategicActionAreas from "@/views/responsibility/StrategicActionAreas";
import EthicsAndCompliance from "@/views/responsibility/EthicsAndCompliance";
import ContentProvider from "@/views/ContentProvider"; //
import Regulations from "@/views/Regulations";
import News from "@/views/News";
import PuertoRosales from "@/views/documents/PuertoRosales";
import DocumentForm from "@/views/documents/DocumentForm";
import DocumentApprove from "@/views/documents/DocumentApprove";
import DocumentDownload from "@/views/documents/DocumentDownload";
import TerminalSuape from "@/views/news/TerminalSuape";
import GreatPlaceToWork from "@/views/news/GreatPlaceToWork";
import OtamericaUnited from "@/views/news/OtamericaUnited";
import JdpProgram from "@/views/career/JdpProgram";
import EsgReport from "@/views/responsibility/EsgReport";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/businessAreasAndTankTerminals",
    name: "BusinessAreasAndTanlTerminals",
    component: BusinessAreasAndTankTerminals,
  },
  {
    path: "/QuickfinderResults",
    name: "QuickfinderResults",
    component: QuickfinderResults,
    props: true,
  },
  {
    path: "/TerminalPage/:id",
    name: "TerminalPage",
    component: TerminalPage,
    props: true,
  },
  {
    path: "/regulations",
    name: "Regulations",
    component: Regulations,
  },
  {
    path: "/PreSelectedResult/:id",
    name: "PreSelectedResult",
    component: PreSelectedResult,
    props: true,
  },
  {
    path: "/OfficePage/:id",
    name: "OfficePage",
    component: OfficePage,
    props: true,
  },
  {
    path: "/bulkLiquidHandling",
    name: "BulkLiquidHandling",
    component: BulkLiquidHandling,
  },
  {
    path: "/politics",
    name: "Politics",
    component: Politics,
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
    path: "/responsibility",
    name: "Responsibility",
    component: Responsibility,
  },
  {
    path: "/hsse",
    name: "Hsse",
    component: Hsse,
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
    path: "/esgReport",
    name: "EsgReport",
    component: EsgReport,
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
    name: "Security",
    component: Security,
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
    path: "/contentProvider",
    name: "ContentProvider",
    component: ContentProvider,
  },
  {
    path: "/news",
    name: "News",
    component: News,
  },
  /************Licitaciones Puerto Rosales*******************/
  {
    path: "/puertoRosales",
    redirect: "/",
    name: "PuertoRosales",
    component: PuertoRosales,
  },
  {
    path: "/documentForm/:id",
    redirect: "/",
    name: "DocumentForm",
    component: DocumentForm,
    props: true,
  },
  {
    path: "/documentApprove/:id/:psec",
    redirect: "/",
    name: "DocumentApprove",
    component: DocumentApprove,
    props: true,
  },
  {
    path: "/documentDownload/:id/:psec",
    redirect: "/",
    name: "DocumentDownload",
    component: DocumentDownload,
    props: true,
  },
  /************************************************************/
  {
    path: "/terminalSuape",
    name: "TerminalSuape",
    component: TerminalSuape,
  },
  {
    path: "/greatPlaceToWork",
    name: "GreatPlaceToWork",
    component: GreatPlaceToWork,
  },
  {
    path: "/jdpProgram",
    name: "JdpProgram",
    component: JdpProgram,
  },
  {
    path: "/otamericaUnited",
    name: "OtamericaUnited",
    component: OtamericaUnited,
  },
];

const router = new VueRouter({
  mode: "hash",
  base: process.env.BASE_URL,
  routes,
});
//router.replace({ path: "*", redirect: "/" });
export default router;
