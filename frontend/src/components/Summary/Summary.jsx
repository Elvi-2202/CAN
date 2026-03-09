import "./Summary.css";

const Summary = ({ nation }) => {

  return (

    <div className="footer-area">

      <div className="recap-box">

        <h3 className="recap-title">
          Récapitulatif
        </h3>

        <p>
          Nation :
          <strong>{nation || "-"}</strong>
        </p>

        <p>
          Nombre de joueurs :
          <strong>12</strong>
        </p>

        <p>
          Prix par joueur :
          <strong>20 €</strong>
        </p>

        <p className="total">
          Total à payer :
          <strong>240 €</strong>
        </p>

      </div>

      <div className="checkbox-area">

        <label>
          <input type="checkbox"/>
          Tous les joueurs sont informés.
        </label>

        <label>
          <input type="checkbox"/>
          Les informations sont exactes.
        </label>

        <label>
          <input type="checkbox"/>
          J'accepte le règlement du tournoi *
        </label>

      </div>

    </div>

  );
};

export default Summary;