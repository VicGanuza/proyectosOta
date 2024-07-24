import Carousel from "react-bootstrap/Carousel";
import { Col, Container, Image, Row } from "react-bootstrap";
import AboutUs from "../assets/AboutUs01.jpg";
import Img2 from "../assets/DSC0441_1.jpg";
import Img3 from "../assets/Hsse_landscape.jpg";

import "./Home.scss";
import { useTranslation } from "react-i18next";

export default function Home() {
  const { t } = useTranslation();

  /*  const [index, setIndex] = useState(0);

  const handleSelect = (selectedIndex) => {
    setIndex(selectedIndex);
  }; */

  return (
    <Container>
      <Row className="justify-content-md-center">
        <Col lg={10}>
          <Carousel>
            <Carousel.Item>
              <Image
                className="d-block w-100"
                src={AboutUs}
                alt="First slide"
              />
              <Carousel.Caption>
                <h5>{t("carousel.caption1.title")}</h5>
                <p
                  dangerouslySetInnerHTML={{
                    __html: t("carousel.caption1.description"),
                  }}
                ></p>
              </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
              <Image className="d-block w-100" src={Img2} alt="First slide" />

              <Carousel.Caption>
                <h5>{t("carousel.caption2.title")}</h5>
                <p
                  dangerouslySetInnerHTML={{
                    __html: t("carousel.caption2.description"),
                  }}
                ></p>
              </Carousel.Caption>
            </Carousel.Item>
            <Carousel.Item>
              <Image
                className="d-block w-100"
                src={Img3}
                alt="First slide"
                fluid
              />

              <Carousel.Caption>
                <h5>{t("carousel.caption3.title")}</h5>
                <p
                  dangerouslySetInnerHTML={{
                    __html: t("carousel.caption3.description"),
                  }}
                ></p>
              </Carousel.Caption>
            </Carousel.Item>
          </Carousel>
        </Col>
      </Row>
      <Row className="justify-content-md-center news-content">
        <h4>Noticias</h4>
        <Col lg={3} className="">
          <div>
            <iframe
              src="https://www.linkedin.com/embed/feed/update/urn:li:share:7133176321274167297"
              height="400"
              width="100%"
              frameborder="0"
              allowfullscreen=""
              title="Publicación integrada"
            ></iframe>
          </div>
        </Col>
        <Col lg={3}>
          <div>
            <iframe
              src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:7131258040967688195"
              height="400"
              width="100%"
              frameborder="0"
              allowfullscreen=""
              title="Publicación integrada"
            ></iframe>
          </div>
        </Col>
        <Col lg={3}>
          <div>
            <iframe
              src="https://www.linkedin.com/embed/feed/update/urn:li:share:7127628145112809472"
              height="400"
              width="100%"
              frameborder="0"
              allowfullscreen=""
              title="Publicación integrada"
            ></iframe>
          </div>
        </Col>
      </Row>
    </Container>
  );
}
