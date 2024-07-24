import React, { Component, Suspense } from "react";
import { withTranslation } from "react-i18next";
import logo from "../OilTanking-America-Logo.svg";
import "./App.scss";
import NavBar from "../components/NavBar";
import UserData from "../components/UserData";
import { PowerBIEmbed } from "powerbi-client-react";
import { models } from "powerbi-client";
import PowerBI from "../components/PowerBIEmbedded.tsx";
import PowerBiIframe from "../components/PowerBiIframe";
import { Outlet } from "react-router-dom";

// use hoc for class based components
class LegacyWelcomeClass extends Component {
  render() {
    const { t } = this.props;
    return <h2>{t("title")}</h2>;
  }
}
const Welcome = withTranslation()(LegacyWelcomeClass);

// Component using the Trans component
function PowerBiGraphic({ report }) {
  return (
    <div>
      <PowerBIEmbed
        embedConfig={{
          type: "report", // Supported types: report, dashboard, tile, visual, qna, paginated report and create
          id: report,
          embedUrl:
            "https://app.powerbi.com/reportEmbed?reportId=" +
            { report } +
            "&ctid=a8f8f1a7-1a1f-42fe-90f2-1f0abc95ceb4",
          accessToken:
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6Ii1LSTNROW5OUjdiUm9meG1lWm9YcWJIWkdldyIsImtpZCI6Ii1LSTNROW5OUjdiUm9meG1lWm9YcWJIWkdldyJ9.eyJhdWQiOiJodHRwczovL2FuYWx5c2lzLndpbmRvd3MubmV0L3Bvd2VyYmkvYXBpIiwiaXNzIjoiaHR0cHM6Ly9zdHMud2luZG93cy5uZXQvYThmOGYxYTctMWExZi00MmZlLTkwZjItMWYwYWJjOTVjZWI0LyIsImlhdCI6MTY5NDAyOTQxNiwibmJmIjoxNjk0MDI5NDE2LCJleHAiOjE2OTQwMzQ1NjUsImFjY3QiOjAsImFjciI6IjEiLCJhaW8iOiJBVFFBeS84VUFBQUFPcDFKR0lWMXdEdnM3NFp1QWc2MzVnQnkyOTA0Z2VwL04xSmpEVUVkT0dYUE5sN1FGc000T1ZpTkVkdnljV2ZlIiwiYW1yIjpbInB3ZCJdLCJhcHBpZCI6Ijg3MWMwMTBmLTVlNjEtNGZiMS04M2FjLTk4NjEwYTdlOTExMCIsImFwcGlkYWNyIjoiMCIsImZhbWlseV9uYW1lIjoiR2FudXphIiwiZ2l2ZW5fbmFtZSI6IlZpY3RvcmlhIiwiaXBhZGRyIjoiMTkwLjI0NS42Ny4xOTQiLCJuYW1lIjoiVmljdG9yaWEgR2FudXphIiwib2lkIjoiNjE1ODE5NzktZjBkMC00MTNmLTgyNmEtYzFmN2Y2M2VlZGMyIiwib25wcmVtX3NpZCI6IlMtMS01LTIxLTE2OTU1OTMxMS01MzY3ODExODAtMTM3NTg3Mjc4MS03OTc3IiwicHVpZCI6IjEwMDMyMDAxQjM4NzkyMUUiLCJyaCI6IjAuQVZBQXBfSDRxQjhhX2tLUThoOEt2SlhPdEFrQUFBQUFBQUFBd0FBQUFBQUFBQUJfQUpBLiIsInNjcCI6InVzZXJfaW1wZXJzb25hdGlvbiIsInNpZ25pbl9zdGF0ZSI6WyJrbXNpIl0sInN1YiI6IktfNExDQWRTam41bnMwdEpjN2ZOQXBMVWtqZURHbnFkTVlqSkdBcnhBak0iLCJ0aWQiOiJhOGY4ZjFhNy0xYTFmLTQyZmUtOTBmMi0xZjBhYmM5NWNlYjQiLCJ1bmlxdWVfbmFtZSI6InZpY3RvcmlhLmdhbnV6YUBleHRlcm4ub3RhbWVyaWNhLmNvbSIsInVwbiI6InZpY3RvcmlhLmdhbnV6YUBleHRlcm4ub3RhbWVyaWNhLmNvbSIsInV0aSI6ImdzN3ZlU3pqVkVDUG9HdGZxeXZNQUEiLCJ2ZXIiOiIxLjAiLCJ3aWRzIjpbImI3OWZiZjRkLTNlZjktNDY4OS04MTQzLTc2YjE5NGU4NTUwOSJdfQ.sRsZmV-gwvjjnFlIsaRUAxK9DCWIn6gLpy_LLLcJC78rgW6OTuiArkZ5tA6kHUpyzSh31oH7PSBJrORE_oDusdyc9xFE5zGFzUIZkdIRh3nGbnY4HblUMaSfpMHfpddyj0l893ef5KWYwKKHkw6V9feb_XXHH1_U0anGKCdXoJdS2ekg0JxWsP6vN3Rnhg6DEtStXggMuTTQhL7Eg01tOyW_5RSPDPOhRFhfwKLR-MP0k9khA57z_TFH0XUFeaXqHRDi7ApTY3qW4FZIKf03QVzSmFyvRXhNBnPxRldcjCOpIrfmh1MmEtCQiYLhXlhKKBGOWO2MSQK47F3dXUdBiQ",
          tokenType: models.TokenType.Aad, // Use models.TokenType.Aad for SaaS embed
          settings: {
            panes: {
              filters: {
                expanded: false,
                visible: false,
              },
            },
            background: models.BackgroundType.Transparent,
          },
        }}
        eventHandlers={
          new Map([
            [
              "loaded",
              function () {
                console.log("Report loaded");
              },
            ],
            [
              "rendered",
              function () {
                console.log("Report rendered");
              },
            ],
            [
              "error",
              function (event) {
                console.log(event.detail);
              },
            ],
            ["visualClicked", () => console.log("visual clicked")],
            ["pageChanged", (event) => console.log(event)],
          ])
        }
        cssClassName={"reportClass"}
        getEmbeddedComponent={(embeddedReport) => {
          window.report = embeddedReport;
        }}
      />
    </div>
  );
}

// page uses the hook
function Page() {
  return (
    <div className="App">
      <NavBar />
      <div className="App-header">
        <UserData />
      </div>
      <div className="App-intro">
        <Outlet />
        {/*<iframe
          title="ITC_KPI"
          width="1140"
          height="541.25"
          src="https://app.powerbi.com/reportEmbed?reportId=c7d1d7ae-393d-4802-8a55-9f021a243ea1&autoAuth=true&ctid=a8f8f1a7-1a1f-42fe-90f2-1f0abc95ceb4"
          frameborder="0"
          allowFullScreen="true"
        ></iframe>
        <PowerBiGraphic report="0841bb34-aaec-41c6-93b9-23f1c1e60356" />
        <PowerBiGraphic report="0841bb34-aaec-41c6-93b9-23f1c1e60356" />
        <PowerBiGraphic report="0841bb34-aaec-41c6-93b9-23f1c1e60356" /> */}
      </div>
    </div>
  );
}

// loading component for suspense fallback
const Loader = () => (
  <div className="App">
    <img src={logo} className="App-logo" alt="logo" />
    <div>loading...</div>
  </div>
);

// here app catches the suspense from page in case translations are not yet loaded
export default function App() {
  return (
    <Suspense fallback={<Loader />}>
      <Page />
    </Suspense>
  );
}
