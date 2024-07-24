import "./Documentation.scss";
import { Trans, useTranslation } from "react-i18next";

export default function CoockiePolicy() {
  const { t } = useTranslation("cookiePolicy");
  return (
    <div className="documentation">
      <h1>{t("title")}</h1>
      <p>{t("p1")}</p>
      <h1>{t("whatIsCookie")}</h1>
      <p>{t("wc1")}</p>
      <p>{t("wc2")}</p>
      <p>{t("wc3")}</p>
      <p>{t("wc3")}</p>
      <ul>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl1"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl2"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl3"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl4"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl5"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl6"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("wcl7"),
          }}
        ></li>
      </ul>
      <h1>{t("cookieTypes")}</h1>
      <p>{t("cookieTypesDescription")}</p>
      <p>{t("cookiesAdmin")}</p>
      <h1>{t("browsers")}</h1>
      <ul>
        <li
          dangerouslySetInnerHTML={{
            __html: t("b1"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("b2"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("b3"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("b4"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("b5"),
          }}
        ></li>
      </ul>
      <p>{t("declineCookies")}</p>
      <h1>{t("mobileBrowsers")}</h1>
      <ul>
        <li
          dangerouslySetInnerHTML={{
            __html: t("mb1"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("mb2"),
          }}
        ></li>
        <li
          dangerouslySetInnerHTML={{
            __html: t("mb3"),
          }}
        ></li>
      </ul>
      <p>{t("cookiesBlocked")}</p>
    </div>
  );
}
