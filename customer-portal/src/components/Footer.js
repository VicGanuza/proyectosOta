import { Container, Image, Nav, Navbar } from "react-bootstrap";
import logo from "../logo-otamerica.svg";

import "./Footer.scss";
import { Link } from "react-router-dom";
import { withTranslation } from "react-i18next";
import { Component } from "react";
import { Linkedin } from "react-bootstrap-icons";

class myFooter extends Component {
  render() {
    return (
      <div className="footer">
        <Navbar expand="lg" className="bg-body">
          <Container>
            <Nav.Link as={Link} to="/">
              <Image src={logo} rounded />
            </Nav.Link>
            <Nav>
              <div className="section-content">
                <h6>{this.props.t("socialNetworks")}</h6>
                <Nav.Link
                  as={Link}
                  target="_blank"
                  to="https://www.linkedin.com/showcase/oiltanking-america/"
                >
                  <Linkedin />
                </Nav.Link>
              </div>
              <div className="section-content">
                <h6>{this.props.t("legals")}</h6>
                <Nav.Link as={Link} to="/cookie-policy">
                  {this.props.t("cookiePolicy")}
                </Nav.Link>
              </div>

              {/* <Nav.Link href="#link">Link</Nav.Link> */}
            </Nav>
          </Container>
        </Navbar>
      </div>
    );
  }
}

const Footer = withTranslation("footer")(myFooter);
Footer.static = myFooter.static;

export default Footer;
