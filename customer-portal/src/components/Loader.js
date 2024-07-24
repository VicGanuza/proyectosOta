import logo from "../logo-otamerica.svg";

import { withTranslation } from "react-i18next";
import { Component } from "react";

import "./Loader.scss";

class myLoader extends Component {
  render() {
    return (
      <div className="loader align-middle">
        <img src={logo} className="App-logo" alt="logo" />
        <h3>{this.props.t("loading")}</h3>
      </div>
    );
  }
}

const Loader = withTranslation("loader")(myLoader);
Loader.static = myLoader.static;

export default Loader;
