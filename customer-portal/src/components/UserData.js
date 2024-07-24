import React, { Component } from "react";
//import AADService from "../services/AADService";
import Cookies from "universal-cookie";
import "./UserData.scss";

export default class UserData extends Component {
  constructor(props) {
    super(props);

    this.cookies = new Cookies();

    this.state = {
      authenticated: null,
      userName: null,
      name: null,
      /* given_name: null,
      roles: null,
      isWriter: null,
      isContributor: null, */
    };

    // this.AzureADService = new AADService();
    this.isAuthenticated = this.isAuthenticated.bind(this);
  }

  componentWillMount() {
    this.isAuthenticated();
  }

  isAuthenticated() {
    /* const user = this.AzureADService.getUser();
    const roles = this.AzureADService.getRoles();
 */
    this.setState({
      userName: this.cookies.get("userName"),
      name: this.cookies.get("name"),
      /* given_name: user.profile.given_name,
      family_name: user.profile.family_name,
      roles: roles ? roles : "none",
      isWriter: this.AzureADService.isInRole("Writer") ? "yes" : "no",
      isContributor: this.AzureADService.isInRole("Contributor") ? "yes" : "no", */
    });
  }

  render() {
    return (
      <div className="container user-data">
        <div className="fs-5 fw-bolder">{this.state.name}</div>
        <p>{this.state.userName}</p>
      </div>
    );
  }
}
