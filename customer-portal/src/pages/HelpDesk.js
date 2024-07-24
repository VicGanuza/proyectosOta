import React, { useState, useEffect } from "react";
import { Alert, Button, Col, Form, InputGroup, Row } from "react-bootstrap";
import axios from "axios";
import { useTranslation } from "react-i18next";
import { useCookies } from "react-cookie";

//import { useParams } from "react-router-dom";

export default function HelpDesk() {
  const { t } = useTranslation("helpDesk");
  const [user, setUser] = useCookies([]);

  const [variant, setVariant] = useState([]);
  const [message, setMessage] = useState([]);
  const [validated, setValidated] = useState(false);
  const [show, setShow] = useState(false);

  const [contact, setContact] = useState({
    name: "",
    lasname: "",
    message: "",
    mail: "",
  });

  const handleSubmit = (event) => {
    const form = event.currentTarget;
    event.preventDefault();
    event.stopPropagation();
    if (form.checkValidity() === true) {
      sendMessage();
    }

    setValidated(true);
  };

  const sendMessage = async () => {
    var f = new FormData();
    let baseUrl = process.env.REACT_APP_WEB_SERVICES + "sendMessage.php";
    f.append("name", contact.name);
    f.append("lastname", contact.lastname);
    f.append("username", user.userName);
    f.append("message", contact.message);
    f.append("mail", contact.mail);
    await axios
      .post(baseUrl, f)
      .then((response) => {
        if (response.data.error) {
          setVariant("danger");
          setShow(true);
          setMessage(response.data.message);
        } else {
          setVariant("success");
          setShow(true);
          setMessage("Su consulta fue enviada");
          document.getElementById("contactForm").reset();
        }
      })
      .catch((error) => {
        setVariant("danger");
        setShow(true);
        setMessage(error.response.data.message);
      });
  };

  return (
    <>
      {show && (
        <Alert variant={variant} onClose={() => setShow(false)} dismissible>
          <Alert.Heading>{t(message)}</Alert.Heading>
        </Alert>
      )}
      <h4>{t("contactTitle")}</h4>
      <div style={{ textAlign: "left" }} className="container-md">
        <Form
          id="contactForm"
          noValidate
          validated={validated}
          onSubmit={handleSubmit}
        >
          <Row className="justify-content-md-center mb-2">
            <Col xs lg="3">
              <Form.Group md="6" controlId="validationCustom01">
                <Form.Label>{t("name")}</Form.Label>
                <Form.Control
                  required
                  type="text"
                  name="name"
                  placeholder={t("namePlaceholder")}
                  onChange={(e) => {
                    setContact({
                      ...contact,
                      name: e.target.value,
                    });
                  }}
                ></Form.Control>
                <Form.Control.Feedback type="invalid">
                  {t("nameRequired")}
                </Form.Control.Feedback>
              </Form.Group>
            </Col>
            <Col xs lg="3">
              <Form.Group controlId="validationCustom02">
                <Form.Label>{t("lastname")}</Form.Label>
                <Form.Control
                  required
                  type="text"
                  name="lastname"
                  placeholder={t("lastnamePlaceholder")}
                  onChange={(e) => {
                    setContact({
                      ...contact,
                      lastname: e.target.value,
                    });
                  }}
                />
                <Form.Control.Feedback type="invalid">
                  {t("lastnameRequired")}
                </Form.Control.Feedback>
              </Form.Group>
            </Col>
          </Row>
          <Row className="justify-content-md-center mb-2">
            <Col xs lg="6">
              <Form.Group controlId="validationCustomGraphicname">
                <Form.Label>{t("mail")}</Form.Label>
                <InputGroup hasValidation>
                  <Form.Control
                    type="email"
                    name="mail"
                    placeholder={t("mailPlaceholder")}
                    aria-describedby="inputGroupPrepend"
                    required
                    onChange={(e) => {
                      setContact({
                        ...contact,
                        mail: e.target.value,
                      });
                    }}
                  />
                  <Form.Control.Feedback type="invalid">
                    {t("mailRequired")}
                  </Form.Control.Feedback>
                </InputGroup>
              </Form.Group>
            </Col>
          </Row>
          <Row className="justify-content-md-center mb-2">
            <Col xs lg="6">
              <Form.Group controlId="validationCustomGraphicname">
                <Form.Label>{t("message")}</Form.Label>
                <InputGroup hasValidation>
                  <Form.Control
                    as="textarea"
                    name="message"
                    placeholder={t("messagePlaceholder")}
                    aria-describedby="inputGroupPrepend"
                    required
                    onChange={(e) => {
                      setContact({
                        ...contact,
                        message: e.target.value,
                      });
                    }}
                  />
                  <Form.Control.Feedback type="invalid">
                    {t("messageRequired")}
                  </Form.Control.Feedback>
                </InputGroup>
              </Form.Group>
            </Col>
          </Row>
          <Row className="justify-content-md-center">
            <Col lg="1">
              <Button variant="outline-success" type="submit" className="m-3">
                {t("send")}
              </Button>
            </Col>
            <Col lg="1">
              <Button
                className="m-3"
                variant="outline-danger"
                onClick={() => {
                  window.location.href = "#/";
                }}
              >
                {t("cancel")}
              </Button>
            </Col>
          </Row>
        </Form>
      </div>
    </>
  );
}
