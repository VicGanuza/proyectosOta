import Vue from "vue";
import VueRouter from "vue-router";
import store from "../store";
import Home from "../views/Home.vue";
import UserManager from "../views/UserManager";
import Login from "../views/Login";
//import Posts from "../views/Posts";

import HistoricalAdmin from "@/views/HistoricalAdmin";
import HistoricalForm from "@/views/HistoricalForm";
import CertificationAdmin from "@/views/CertificationAdmin";
import CertificateForm from "@/views/CertificateForm";
import DocumentationAdmin from "@/views/DocumentationAdmin";
import PublicAccessAdmin from "@/views/PublicAccessAdmin";
import PublicAccessForm from "@/views/PublicAccessForm";
import DocumentationForm from "@/views/DocumentationForm";
import UserForm from "@/views/UserForm";
import RestrictedAccess from "@/views/RestrictedAccess";
import CurrentPoliciesAdmin from "@/views/CurrentPoliciesAdmin";
import CurrentPoliciesForm from "@/views/CurrentPoliciesForm";
import RegulationsAdmin from "@/views/RegulationsAdmin";
import RegulationsForm from "@/views/RegulationsForm";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { requiresAuth: true },
    children: [
      {
        // historicalAdmin will be rendered inside Home's <router-view>
        // when /historicalAdmin is matched
        path: "/historicalMovementsAdmin",
        name: "HistoricalAdmin",
        component: HistoricalAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/addHistorical",
        name: "HistoricalForm",
        component: HistoricalForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editHistorical/:id",
        name: "HistoricalForm",
        component: HistoricalForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/publicAccessAdmin",
        name: "PublicAccessAdmin",
        component: PublicAccessAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/addPublicAccess",
        name: "PublicAccessForm",
        component: PublicAccessForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editPublicAccess/:id",
        name: "PublicAccessForm",
        component: PublicAccessForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/certificationsAdmin",
        name: "CertificationAdmin",
        component: CertificationAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/editCertificate/:id",
        name: "CertificateForm",
        component: CertificateForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/documentationAdmin",
        name: "DocumentationAdmin",
        component: DocumentationAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/addDocument",
        name: "DocumentationForm",
        component: DocumentationForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editDocument/:id",
        name: "DocumentationForm",
        component: DocumentationForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/userManager",
        name: "UserManager",
        component: UserManager,
        meta: { requiresAuth: true },
      },
      {
        path: "/addUser",
        name: "UserForm",
        component: UserForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editUser/:id",
        name: "UserForm",
        component: UserForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/currentPoliciesAdmin",
        name: "CurrentPoliciesAdmin",
        component: CurrentPoliciesAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/addPolicy",
        name: "CurrentPoliciesForm",
        component: CurrentPoliciesForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editPolicy/:id",
        name: "CurrentPoliciesForm",
        component: CurrentPoliciesForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/regulationsAdmin",
        name: "RegulationsAdmin",
        component: RegulationsAdmin,
        meta: { requiresAuth: true },
      },
      {
        path: "/addRegulation",
        name: "RegulationsForm",
        component: RegulationsForm,
        meta: { requiresAuth: true },
      },
      {
        path: "/editRegulation/:id",
        name: "RegulationsForm",
        component: RegulationsForm,
        meta: { requiresAuth: true },
      },
    ],
  },
  /*  */
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { guest: true },
  },
  {
    path: "/restrictedAccess",
    name: "RestrictedAccess",
    component: RestrictedAccess,
    meta: { guest: true },
  },
];

const router = new VueRouter({
  mode: "hash",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.matched.some((record) => record.meta.requiresAuth)) {
    if (store.getters.isAuthenticated) {
      next();
      return;
    }
    next("/login");
  } else {
    next();
  }
});

export default router;
