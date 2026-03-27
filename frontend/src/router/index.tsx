import { createBrowserRouter } from "react-router-dom";
import Layout from "../components/Layout";
import Home from "../pages/Home";
import Teams from "../pages/Teams";
import Payment from "../pages/Payment";
import NotFound from "../pages/NotFound";
import TeamRegistrationForm from "../pages/TeamRegistrationForm";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <Layout />,
    errorElement: <NotFound />,
    children: [
      {
        index: true,
        element: <Home />,
      },
      {
        path: "teams",
        element: <Teams />,
      },
      {
        path: "payment",
        element: <Payment />,
      },
      {
        path: "register",
        element: <TeamRegistrationForm />,
      }
    ],
  },
]);