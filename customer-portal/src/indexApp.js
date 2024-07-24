import React from "react";
import { createRoot } from "react-dom/client";
import "./index.scss";
import * as serviceWorker from "./services/serviceWorker";

import Router from "./routes/Routes";

import "./i18n";
import AADService from "./services/AADService";

import Cookies from "universal-cookie";

const AzureADService = new AADService();
const cookies = new Cookies();

//if (cookies.get("cookieConsent")) {
//const user = AzureADService.getUser();
const user = {
  userName: "Victoria",
  profile: {
    name: "Vic",
    given_name: "Victoria",
    family_name: "Ganuza",
  },
};
cookies.set("userName", user.userName);
cookies.set("name", user.profile.name);
cookies.set("firstname", user.profile.given_name);
cookies.set("lastname", user.profile.family_name);
//}
localStorage.setItem("count", 0);

const root = createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <Router />
  </React.StrictMode>
);

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: http://bit.ly/CRA-PWA
serviceWorker.unregister();
