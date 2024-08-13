import { createI18n } from "vue-i18n";
import pt from "@/locales/pt.json";
import en from "@/locales/en.json";
import es from "@/locales/es.json";

const i18n = new createI18n({
  locale: localStorage.getItem("lang") || "en", // set locale
  /* globalInjection: true,
  allowComposition: true, */
  fallbackLocale: "es", // set fallback locale
  messages: { es, en, pt }, // set locale messages
});

export default i18n;
