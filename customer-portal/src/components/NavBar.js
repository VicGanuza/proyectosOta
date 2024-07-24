//  /src/Navbar.js
import React, { Component } from "react";
import { Navbar, Nav, NavDropdown, Image } from "react-bootstrap";
import Container from "react-bootstrap/Container";
import Dropdown from "react-bootstrap/Dropdown";
import Button from "react-bootstrap/Button";

import AADService from "../services/AADService";
import logo from "../logo-otamerica.svg";
import "./NavBar.scss";

import { withTranslation } from "react-i18next";
import { Trans } from "react-i18next";

import { Link } from "react-router-dom";

class MyComponent extends Component {
  constructor(props) {
    super(props);
    console.log(this.props.list);

    this.state = {
      authenticated: null,
      listItems: null,
    };
    this.AzureADService = new AADService();

    this.isAuthenticated = this.isAuthenticated.bind(this);
    this.login = this.login.bind(this);
    this.logout = this.logout.bind(this);

    this.state.listItems =
      this.props.list &&
      this.props.list.map((gr) => (
        // Correct! Key should be specified inside the array.
        <NavDropdown.Item
          key={`graphicMenu_${gr.id}`}
          as={Link}
          to={"/graphic/" + gr.id}
        >
          {gr.menu_title}
        </NavDropdown.Item>
      ));
  }

  componentWillMount() {
    this.isAuthenticated();
  }

  isAuthenticated() {
    this.setState({
      authenticated: this.AzureADService.loggedIn(),
    });
  }

  login() {
    this.AzureADService.login();
  }

  logout() {
    this.AzureADService.logout();
  }

  render() {
    const { t, i18n } = this.props;
    const changeLanguage = (lng) => {
      i18n.changeLanguage(lng);
    };
    return (
      <div className="header">
        <Navbar expand="lg" className="bg-body">
          <Container>
            <Nav.Link as={Link} to="/" className="no-hover">
              <Image src={logo} rounded />
            </Nav.Link>

            <Nav>
              <Dropdown>
                <Dropdown.Toggle
                  variant="outline-secondary"
                  id="dropdown-basic"
                >
                  <Trans i18nKey="language"></Trans>
                </Dropdown.Toggle>
                <Dropdown.Menu className="no-padding">
                  <Dropdown.Item>
                    <Button variant="link" onClick={() => changeLanguage("es")}>
                      <Trans i18nKey="spanish"></Trans>
                    </Button>
                  </Dropdown.Item>
                  <Dropdown.Item>
                    <Button variant="link" onClick={() => changeLanguage("en")}>
                      <Trans i18nKey="english"></Trans>
                    </Button>
                  </Dropdown.Item>
                </Dropdown.Menu>
              </Dropdown>

              {this.state.authenticated === false && (
                <Button variant="outline-secondary" onClick={this.login}>
                  <Trans i18nKey="login"></Trans>
                </Button>
              )}
              {this.state.authenticated === true && (
                <Button variant="outline-secondary" onClick={this.logout}>
                  <Trans i18nKey="logout"></Trans>
                </Button>
              )}
            </Nav>
          </Container>
        </Navbar>
        <Navbar expand="lg" className="bg-body">
          <Container>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
              <Nav className="me-auto">
                {this.props.list.length && this.props.list.length === 1 && (
                  <Nav.Link as={Link} to={"/graphic/" + this.props.list[0].id}>
                    {this.props.list[0].menu_title}
                  </Nav.Link>
                )}
                {this.props.list.length > 1 && (
                  <NavDropdown title={t("indicators")} id="basic-nav-dropdown">
                    {this.state.listItems}
                  </NavDropdown>
                )}

                <Nav.Link as={Link} to="/help-desk">
                  <Trans i18nKey="helpDesk"></Trans>
                </Nav.Link>
                {/* <Nav.Link as={Link} to="/faqs">
                  <Trans i18nKey="faqs"></Trans>
                </Nav.Link> */}
                <Nav.Link as={Link} to="/contentProvider">
                  <Trans i18nKey="contentProvider"></Trans>
                </Nav.Link>
                {this.props.admin && (
                  <NavDropdown
                    title={t("administration")}
                    id="basic-nav-dropdown"
                  >
                    <NavDropdown.Item as={Link} to="/groups">
                      <Trans i18nKey="groups"></Trans>
                    </NavDropdown.Item>
                    <NavDropdown.Item as={Link} to="/users">
                      <Trans i18nKey="users"></Trans>
                    </NavDropdown.Item>
                    <NavDropdown.Item as={Link} to="/graphics">
                      <Trans i18nKey="graphics"></Trans>
                    </NavDropdown.Item>
                  </NavDropdown>
                )}
              </Nav>
            </Navbar.Collapse>
          </Container>
        </Navbar>
      </div>
    );
  }
}

const NavBar = withTranslation()(MyComponent);
NavBar.static = MyComponent.static;

export default NavBar;
