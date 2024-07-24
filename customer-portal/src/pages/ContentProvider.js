import { Col, Row } from "react-bootstrap";
import "./ContentProvider.scss";
import { useTranslation } from "react-i18next";
import { Envelope, Telephone } from "react-bootstrap-icons";

export default function ContentProvider() {
  const { t } = useTranslation("contentProvider");
  return (
    <div>
      <h3>{t("title")}</h3>
      <Row className="justify-content-md-center provider-content">
        <Col md={6}>
          <h4>{t("websiteOwnerTitle")}</h4>
          <p>
            <span class="font-weight-black">
              {t("websiteOwnerCompany")}
              <br />
            </span>
            {t("websiteOwnerAddress")}
            <br />
            {t("websiteOwnerCity")}
            <br />
            {t("websiteOwnerCountry")}
            <br />
          </p>
          <p>
            <span>
              <Telephone />
              +49 40 37099-0
              <br />
            </span>
          </p>
          <p>
            {t("websiteOwnerManagement")}:<br />
            {t("websiteOwnerPersonal")}
            <br />
          </p>
          <h2>{t("websiteContents.title")}</h2>
          <p>
            <span class="font-weight-black">
              {t("websiteContents.company")}
              <br />
            </span>
            {t("websiteContents.address")}
            <br />
            {t("websiteContents.city")}
            <br />
            {t("websiteContents.country")}
            <br />
          </p>
          <p>
            {t("websiteContents.management")}:<br />
            {t("websiteContents.personal")}
            <br />
          </p>
          <p>
            <span>
              <Envelope />
              <a href="`mailto:online-media@oiltanking.com`">
                media-communications@otamerica.com
              </a>
              <br />
            </span>
          </p>
          <h2>{t("websiteProgramming.title")}</h2>
          <p>
            <span class="font-weight-black">
              {t("websiteProgramming.company")}
              <br />
            </span>
            {t("websiteProgramming.description")}
            <br />
            {t("websiteProgramming.city")}
            <br />
            {t("websiteProgramming.country")}
            <br />
          </p>
          <p>
            <span>
              <Envelope />
              <a
                href="https://www.linkedin.com/in/victoriaganuza/"
                target="_blank"
              >
                LinkedIn
              </a>
              <br />
            </span>
          </p>
        </Col>
      </Row>
    </div>
  );
}
