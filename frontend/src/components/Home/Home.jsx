import { useState } from "react";
import { useNavigate } from "react-router-dom";
import Nation from "../Nation/Nation";
import TeamManager from "../TeamManager/TeamManager";
import Players from "../Players/Players";
import Summary from "../Summary/Summary";
import "./Home.css";

const Home = () => {

  const [nation, setNation] = useState("");

  const navigate = useNavigate();

  return (
    <div className="page-bg">
      <div className="container">

        <h1 className="main-title">
          Formulaire d'inscription d'équipe
        </h1>

        <Nation nation={nation} setNation={setNation} />

        <TeamManager/>

        <Players/>

        <Summary nation={nation} />

        <button
          className="submit-btn"
          onClick={() => navigate("/payment")}
        >
          Payer et valider l'inscription
        </button>

      </div>
    </div>
  );
};

export default Home;