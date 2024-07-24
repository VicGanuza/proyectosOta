import React, { useState } from "react";
import { useParams } from "react-router-dom";
import PowerBiIframe from "../components/PowerBiIframe";
import Loader from "../components/Loader";
import { useFetchById } from "../services/useFetch";
import { Col, Container, Row } from "react-bootstrap";
import Cookies from "universal-cookie";

import "./Comments.scss";
import Comment from "../components/Coments";

export default function PowerBiPage() {
  const { id } = useParams();
  const cookie = new Cookies();
  const baseURL = process.env.REACT_APP_WEB_SERVICES + "getGraphic.php";
  const { data, loading } = useFetchById(baseURL, id);
  const [cFocus, SetCFocus] = useState(false);

  return (
    <div className="App">
      {loading && <Loader />}
      {data && (
        <Container>
          <Row>
            <Col md={8}>
              <PowerBiIframe
                title={data.title}
                reportId={data.token}
                id={id}
                user={cookie.get("userName")}
              />
              <p className="note">Los datos son sólo para consulta</p>
            </Col>
            <Col md={4}>
              <Comment id={id}></Comment>
            </Col>
          </Row>
        </Container>
      )}
    </div>
  );
}
