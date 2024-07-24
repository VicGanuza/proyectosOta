import { Component } from "react";
import axios from "axios";

class PowerBiIframe extends Component {
  constructor(props) {
    super(props);
    this.state = {
      id: props.id,
      iframeId: 0,
    };
  }

  componentDidMount() {
    this.hasAccess();
    var blobMe = URL["createObjectURL"](new Blob([""], { type: "text/html" }));
    const url = "https://app.powerbi.com/view?r=" + this.props.reportId;
    var elIframe = document["createElement"]("iframe");
    var iframeContent = document["createElement"]("div");
    iframeContent["setAttribute"]("id", "iframeContent");
    elIframe["setAttribute"]("frameborder", "0");
    elIframe["setAttribute"]("width", "100%");
    elIframe["setAttribute"]("height", "600px");
    elIframe["setAttribute"]("allowfullscreen", "true");
    elIframe["setAttribute"]("webkitallowfullscreen", "true");
    elIframe["setAttribute"]("mozallowfullscreen", "true");
    elIframe["setAttribute"]("src", blobMe);
    var idOne = "pbi_" + Date.now();
    elIframe["setAttribute"]("id", idOne);
    if (document.getElementById("powerBi").childElementCount === 0) {
      document.getElementById("powerBi").appendChild(iframeContent);
      document.getElementById("iframeContent").appendChild(elIframe);
      this.setState({ iframeId: idOne, id: this.props.reportId });
      document["getElementById"](idOne)["contentWindow"]["document"].write(
        '<script type="text/javascript">location.href = "' +
          url +
          '";\x3c/script>'
      );
    }
  }

  componentDidUpdate() {
    if (this.state.id != this.props.reportId) {
      this.hasAccess();
      var iFrame = document.getElementById(this.state.iframeId);
      var blobMe = URL["createObjectURL"](
        new Blob([""], { type: "text/html" })
      );
      const newUrl = "https://app.powerbi.com/view?r=" + this.props.reportId;
      iFrame.setAttribute("src", blobMe);
      var idOne = "pbi_" + Date.now();
      iFrame["setAttribute"]("id", idOne);
      if (document.getElementById("powerBi").childElementCount > 0) {
        let el = document.getElementById("iframeContent");
        document.getElementById("powerBi").removeChild(el);
        let iframeContent = document["createElement"]("div");
        iframeContent["setAttribute"]("id", "iframeContent");
        document.getElementById("powerBi").appendChild(iframeContent);
        document.getElementById("iframeContent").appendChild(iFrame);
        this.setState({ iframeId: idOne, id: this.props.reportId });
        document["getElementById"](idOne)["contentWindow"]["document"].write(
          '<script type="text/javascript">location.href = "' +
            newUrl +
            '";\x3c/script>'
        );
      }
    }
  }

  async hasAccess() {
    let baseUrl =
      process.env.REACT_APP_WEB_SERVICES +
      `hasAccess.php?id=${this.props.id}&user=${this.props.user}`;

    await axios
      .get(baseUrl)
      .then((response) => {
        if (!response.data.hasAccess) window.location.href = "#/";
      })
      .catch((error) => {
        window.location.href = "#/";
      });
  }
  render() {
    return (
      <div>
        <h1>{this.props.title}</h1>
        <div id="powerBi"></div>
      </div>
    );
  }
}

export default PowerBiIframe;
