import React from "react";
import { createHashRouter, RouterProvider } from "react-router-dom";

import App from "../pages/App";
//import Pdf from "../pages/Pdf";
import ErrorPage from "../pages/ErrorPage";
import PowerBiPage from "../pages/PowerBiPage";
import CoockiePolicy from "../pages/CookiePolicy";
import Groups from "../pages/administration/Groups";
import Users from "../pages/administration/Users";
import UserList from "../pages/administration/Users/UserList";
import AddEditUser from "../pages/administration/Users/AddEditUser";
import GroupList from "../pages/administration/Groups/GroupList";
import Graphics from "../pages/administration/Graphics";
import GraphicList from "../pages/administration/Graphics/GraphicList";
import AddEditGraphic from "../pages/administration/Graphics/AddEditGraphic";
import AddEditGroup from "../pages/administration/Groups/AddEditGroup";
import Home from "../pages/Home";
import HelpDesk from "../pages/HelpDesk";
import Faqs from "../pages/Faqs";
import ContentProvider from "../pages/ContentProvider";
/*import WorkshopsPage from "../pages/WorkshopsPage";
import MemberShipPage from "../pages/Membership"; */

const RouteObject = [
  {
    path: "/",
    element: <App />,
    errorElement: <ErrorPage />,
    children: [
      {
        path: "/",
        element: <Home />,
      },
      {
        path: "/graphic/:id",
        element: <PowerBiPage />,
      },
      {
        path: "/cookie-policy",
        element: <CoockiePolicy />,
      },
      {
        path: "/help-desk",
        element: <HelpDesk />,
      },
      {
        path: "/faqs",
        //element: <Faqs />,
      },
      {
        path: "/contentProvider",
        element: <ContentProvider />,
      },
      {
        path: "/groups",
        element: <Groups />,
        children: [
          {
            path: "",
            element: <GroupList />,
          },
          {
            path: "new",
            element: <AddEditGroup />,
          },
          {
            path: "edit/:id",
            element: <AddEditGroup />,
          },
        ],
      },
      {
        path: "users",
        element: <Users />,
        children: [
          {
            path: "",
            element: <UserList />,
          },
          {
            path: "new",
            element: <AddEditUser />,
          },
          {
            path: "edit/:id",
            element: <AddEditUser />,
          },
        ],
      },
      {
        path: "graphics",
        element: <Graphics />,
        children: [
          {
            path: "",
            element: <GraphicList />,
          },
          {
            path: "new",
            element: <AddEditGraphic />,
          },
          {
            path: "edit/:id",
            element: <AddEditGraphic />,
          },
        ],
      },
    ],
  },
  /*{
    path: "/users",
    element: <Users />,
    children: [
      {
        path: "/list",
        element: <UserList />,
      },
    ],
  },

 {
    path: "/tyc",
    element: <Pdf name="terminos_y_condiciones.pdf" />,
  },
  {
    path: "/workshops",
    element: <WorkshopsPage />,
  },
  {
    path: "/membership",
    element: <MemberShipPage />,
  }, */
];

const router = createHashRouter(RouteObject);

function Router() {
  return <RouterProvider router={router} />;
}

export default Router;
