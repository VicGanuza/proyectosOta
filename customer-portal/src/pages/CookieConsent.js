import React, { Component, useState } from "react";
import { useCookies } from "react-cookie";
import Modal from "react-bootstrap/Modal";
import Button from "react-bootstrap/Button";
import "./Modal.scss";
import axios from "axios";
import { useTranslation } from "react-i18next";

import AADService from "../services/AADService";
import { Alert } from "react-bootstrap";
const CookieConsent = () => {
  const [cookie, setCookie] = useCookies(["cookieConsent"]);
  const AzureADService = new AADService();
  const { t } = useTranslation("cookiePolicy");
  const [user, setUser] = useState(AzureADService.getUser());
  const [variant, setVariant] = useState([]);
  const [message, setMessage] = useState("");
  const [showM, setShowM] = useState(false);

  const setConsent = async (cc) => {
    const baseURL = process.env.REACT_APP_WEB_SERVICES + "setConsent.php";
    var f = new FormData();
    f.append("username", user.userName);
    f.append("cookieConsent", cc);
    await axios
      .post(baseURL, f)
      .then((response) => {
        if (response.data.error) {
          setVariant("danger");
          setShowM(true);
          setMessage(response.data.message);
        } else {
          setShow(false);
          setCookie("cookieConsent", cc, { path: "/" });
          if (cc) {
            setCookie("userName", user.userName, { path: "/" });
            setCookie("name", user.profile.name, { path: "/" });
          } else {
            AzureADService.logout();
          }
        }
      })
      .catch((error) => {
        setVariant("danger");
        setShowM(true);
        setMessage(error.response.data.message);
      });
  };

  const giveCookieConsent = () => {
    setConsent(true);
  };
  const rejectCookieConsent = () => {
    setConsent(false);
  };

  const [show, setShow] = useState(true);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

  const [modalIsOpen, setIsOpen] = React.useState(true);

  function openModal() {
    setIsOpen(true);
  }

  function closeModal() {
    setIsOpen(false);
  }

  return (
    <>
      {show && (
        <Alert variant={variant} onClose={() => setShow(false)} dismissible>
          <Alert.Heading>{t(message)}</Alert.Heading>
        </Alert>
      )}
      <div className="cookie-consent">
        <Modal size="lg" show={show} onHide={handleClose} centered>
          <Modal.Header closeButton>
            <Modal.Title>{t("modal.title")}</Modal.Title>
          </Modal.Header>
          <Modal.Body>
            <p
              dangerouslySetInnerHTML={{
                __html: t("modal.description"),
              }}
            />
          </Modal.Body>
          <Modal.Footer>
            {/* <Link to="">
            Ver mas información
          </Button> */}
            <Button variant="secondary" onClick={rejectCookieConsent}>
              {t("modal.reject")}
            </Button>
            <Button variant="danger" onClick={giveCookieConsent}>
              {t("modal.accept")}
            </Button>
          </Modal.Footer>
        </Modal>
        {/* <button onClick={openModal}>Open Modal</button>
       
      <Modal
        isOpen={modalIsOpen}
        onAfterOpen={afterOpenModal}
        onRequestClose={closeModal}
        style={customStyles}
        contentLabel="Example Modal"
      >
        <h2 ref={(_subtitle) => (subtitle = _subtitle)}>
          Acerca de las cookies en este sitio web
        </h2>
        <CloseButton onClick={closeModal} />
        <p>
          We use cookies to enhance your user experience. By using our website,
          you agree to our use of cookies.{" "}
          <a href={"/privacy-policy"}>Learn more.</a>
        </p>
        <form>
          <input />
          <button onClick={giveCookieConsent}>Accept</button>
          <button>stays</button>
          <button>inside</button>
          <button>the modal</button>
        </form>
      </Modal>*/}
        {/* <div className="cookie-consent">
        <p>
          We use cookies to enhance your user experience. By using our website,
          you agree to our use of cookies.{" "}
          <a href={"/privacy-policy"}>Learn more.</a>
        </p>
        <button onClick={giveCookieConsent}>Accept</button>
      </div> */}
      </div>
    </>
  );
};

export default CookieConsent;
