import React, { Suspense, useState } from "react";
import "./App.scss";
import "./Forms.scss";
import NavBar from "../components/NavBar";
import UserData from "../components/UserData";
import { Outlet } from "react-router-dom";
import CookieConsent from "./CookieConsent";
import { useCookies } from "react-cookie";
import Footer from "../components/Footer";
import Loader from "../components/Loader";
import fetchData from "../services/fetchData";
import axios from "axios";
import Cookies from "universal-cookie";
import { Alert } from "react-bootstrap";
import { useTranslation } from "react-i18next";

const cookie = new Cookies();

const baseURL =
  process.env.REACT_APP_WEB_SERVICES +
  "getGraphics.php?user=" +
  cookie.get("userName");

const userURL =
  process.env.REACT_APP_WEB_SERVICES +
  "getUserByUsername.php?user=" +
  cookie.get("userName");

const apiData = fetchData(baseURL);
const userData = fetchData(userURL);
// page uses the hook
function Page(l) {
  return (
    <div className="App">
      <NavBar list={l.l} admin={cookie.get("isAdmin")} />
      <div className="App-header">
        <UserData />
      </div>
      <div className="App-intro">
        <Outlet />
      </div>
      <Footer />
    </div>
  );
}

// here app catches the suspense from page in case translations are not yet loaded
export default function App() {
  const [cookies] = useCookies(["cookieConsent"]);
  const graphics = apiData.read();
  const user = userData.read();
  const [variant, setVariant] = useState([]);
  const [message, setMessage] = useState([]);
  const [show, setShow] = useState(false);
  const { t } = useTranslation("users");
  let count = parseInt(localStorage.getItem("count"));
  count = count + 1;
  localStorage.setItem("count", count);

  const createUser = async () => {
    let url = process.env.REACT_APP_WEB_SERVICES + "newUser.php";
    var f = new FormData();
    f.append("username", cookie.get("userName"));
    f.append("name", cookie.get("firstname"));
    f.append("lastname", cookie.get("lastname"));
    await axios
      .post(url, f)
      .then((response) => {
        if (response.data.error) {
          setVariant("danger");
          setShow(true);
          setMessage(response.data.message);
        }
      })
      .catch((error) => {
        setVariant("danger");
        setShow(true);
        setMessage(error.response.data.message);
      });
  };

  if (user) {
    cookie.set("isAdmin", user.isAdmin == 1);
    cookie.set("cookieConsent", user.cookieConsent == 1);
  } else {
    if (count == 1) {
      createUser();
    }
  }

  return (
    <Suspense fallback={<Loader />}>
      {show && (
        <Alert variant={variant} onClose={() => setShow(false)} dismissible>
          <Alert.Heading>{t(message)}</Alert.Heading>
        </Alert>
      )}
      {!cookies.cookieConsent && <CookieConsent />}
      <Page l={graphics} />
    </Suspense>
  );
}
