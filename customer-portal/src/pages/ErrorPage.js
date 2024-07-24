import { useRouteError } from "react-router-dom";
//import { Container } from "@material-ui/core";
import { useTranslation } from "react-i18next";
import NavBar from "../components/NavBar";
import { Container } from "react-bootstrap";

export default function ErrorPage() {
  const error = useRouteError();
  const { t } = useTranslation("errorPage");

  return (
    <>
      <NavBar />
      <Container>
        <div id="error-page" className="error-page">
          <h1>Oops!</h1>
          <p>{t("somethingWentWrong")}</p>
          <p>
            <i>{error.statusText || error.message}</i>
          </p>
        </div>
      </Container>
    </>
  );
}
