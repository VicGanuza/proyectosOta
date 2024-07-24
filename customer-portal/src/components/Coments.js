import axios from "axios";
import { Component } from "react";
import { withTranslation } from "react-i18next";
import { Accordion, Button, Form, InputGroup } from "react-bootstrap";
import Cookies from "universal-cookie";
//import { t } from "i18next";

class MyComment extends Component {
  constructor(props) {
    super(props);
    this.cookies = new Cookies();
    this.state = {
      graph_id: null,
      cFocus: false,
      comments: [],
      validated: false,
      validatedReply: false,
      newComment: "",
      newReply: "",
      username: "",
      avatar: "",
      isAdmin: false,
    };
    this.handleSubmit = this.handleSubmit.bind(this);
  }
  async getComments() {
    console.log("getComents");
    let url =
      process.env.REACT_APP_WEB_SERVICES +
      "getComments.php?gid=" +
      this.props.id;
    await axios.get(url).then((response) => {
      this.setState({
        comments: response.data,
      });
    });
  }

  handleSubmit(event) {
    const form = event.currentTarget;
    event.preventDefault();
    event.stopPropagation();
    if (form.checkValidity() === true) {
      this.comment();
    }
    this.setState({ validated: true });
  }

  async comment() {
    let baseUrl = process.env.REACT_APP_WEB_SERVICES + "commentGraphic.php";
    var f = new FormData();
    f.append("newComment", this.state.newComment);
    f.append("graphic_id", this.state.graph_id);
    f.append("user", this.state.username);
    await axios.post(baseUrl, f).then((response) => {
      if (response) {
        this.setState({
          newComment: "",
        });
        this.getComments();
      }
    });
  }

  async replyComment(id, index) {
    if (this.state.newReply != "") {
      let baseUrl = process.env.REACT_APP_WEB_SERVICES + "replyComment.php";
      var f = new FormData();
      f.append("newReplay", this.state.newReply);
      f.append("comment_id", id);
      f.append("user", this.state.username);
      await axios.post(baseUrl, f).then((response) => {
        if (response) {
          this.setState({
            newReply: "",
          });
          this.getComments();
          document.getElementById(`reply_${index}`).classList.remove("active");
        }
      });
    }
  }
  componentDidMount() {
    console.log("mount");
    if (this.props.id != this.state.graph_id) {
      this.getComments();
      this.setState({
        isAdmin: this.cookies.get("isAdmin"),
        username: this.cookies.get("userName"),
        avatar:
          this.cookies.get("firstname")[0] + this.cookies.get("lastname")[0],
      });
    }
    this.state.graph_id = this.props.id;
  }
  componentDidUpdate() {
    console.log("update");
    if (this.props.id != this.state.graph_id) {
      this.getComments();
    }
    this.state.graph_id = this.props.id;
  }
  render() {
    const { t, i18n } = this.props;
    const {
      graph_id,
      cFocus,
      comments,
      validated,
      validatedReply,
      newComment,
      newReply,
      userName,
      avatar,
      isAdmin,
    } = this.state;
    return (
      <div className="comment-content">
        <h6>{t("comments")}</h6>
        <div className="comment-field">
          <Form noValidate validated={validated} onSubmit={this.handleSubmit}>
            <InputGroup>
              <InputGroup.Text className="avatar">{avatar}</InputGroup.Text>
              <Form.Control
                required
                as="textarea"
                name="newComment"
                value={newComment}
                onFocus={() => {
                  this.setState({
                    cFocus: true,
                  });
                }}
                onChange={(e) => {
                  this.setState({
                    newComment: e.target.value,
                  });
                }}
              />
              <Form.Control.Feedback type="invalid">
                {t("commentRequierd")}
              </Form.Control.Feedback>
            </InputGroup>
            {cFocus && (
              <div className="button-content">
                <Button
                  className="float-end m-2"
                  variant="outline-danger"
                  onClick={() => {
                    this.setState({
                      cFocus: false,
                    });
                  }}
                >
                  {t("cancel")}
                </Button>
                <Button
                  variant="outline-success"
                  type="submit"
                  className="float-end m-2"
                >
                  {t("save")}
                </Button>
              </div>
            )}
          </Form>
        </div>
        {comments &&
          comments.map((c, i) => (
            <div className="comment-history" key={`comment_${i}`}>
              <div className="avatar">{c.avatar}</div>
              <div className="comment-history-content">
                <div className="comment-date">
                  {c.fullname} {c.date}
                </div>
                <div className="comment-text">{c.comment}</div>
                {/* {isAdmin && ( */}
                <div className="button-content">
                  <Button
                    variant="link"
                    type="submit"
                    className="primary"
                    onClick={() => {
                      document.getElementById(`reply_${i}`).className =
                        "active";
                    }}
                  >
                    {t("replay")}
                  </Button>
                </div>
                {/* )} */}
                <Form id={`reply_${i}`} noValidate>
                  <InputGroup>
                    <InputGroup.Text
                      className={`avatar ${
                        this.state.isAdmin ? "isAdmin" : ""
                      }`}
                    >
                      {this.state.avatar}
                    </InputGroup.Text>
                    <Form.Control
                      required
                      as="textarea"
                      value={newReply}
                      onChange={(e) => {
                        this.setState({ newReply: e.target.value });
                      }}
                    />
                    <Form.Control.Feedback type="invalid">
                      {t("commentRequierd")}
                    </Form.Control.Feedback>
                  </InputGroup>

                  <div className="button-content">
                    <Button
                      className="float-end m-2"
                      variant="outline-danger"
                      onClick={() => {
                        document
                          .getElementById(`reply_${i}`)
                          .classList.remove("active");
                      }}
                    >
                      {t("cancel")}
                    </Button>
                    <Button
                      variant="outline-success"
                      className="float-end m-2"
                      onClick={() => {
                        this.replyComment(c.id, i);
                      }}
                    >
                      {t("save")}
                    </Button>
                  </div>
                </Form>
                {c.reply.length > 0 && (
                  <Accordion>
                    <Accordion.Item eventKey="0">
                      <Accordion.Header>
                        {c.reply.length === 1 && (
                          <>
                            {c.reply.length} {t("oneAnswer")}
                          </>
                        )}
                        {c.reply.length > 1 && (
                          <>
                            {c.reply.length} {t("multipleAnswers")}
                          </>
                        )}
                      </Accordion.Header>
                      <Accordion.Body>
                        {c.reply.map((r) => (
                          <div className="comment-answer">
                            <div
                              className={`avatar ${r.isAdmin ? "isAdmin" : ""}`}
                            >
                              {r.avatar}
                            </div>
                            <div className="comment-history-content">
                              <div className="comment-date">
                                {r.fullname} {r.date}
                              </div>
                              <div className="comment-text">{r.comment}</div>
                            </div>
                          </div>
                        ))}
                      </Accordion.Body>
                    </Accordion.Item>
                  </Accordion>
                )}
              </div>
            </div>
          ))}
      </div>
    );
  }
}

const Comment = withTranslation("comments")(MyComment);
Comment.static = MyComment.static;

export default Comment;
