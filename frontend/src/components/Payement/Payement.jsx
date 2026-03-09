import "./Payement.css";

const Payment = () => {
  return (
    <div className="payment-page">
      <div className="payment-card">

        <div className="payment-header">
          Paiement sécurisé
        </div>

        <p className="payment-subtitle">
          Entrez vos informations bancaires.
        </p>

        <input
          type="text"
          placeholder="Numéro de la carte"
          className="payment-input"
        />

        <input
          type="text"
          placeholder="Nom sur la carte"
          className="payment-input"
        />

        <div className="expiration-row">
          <div>
            <label>Date d'expiration</label>
          </div>
          <input
            type="text"
            placeholder="Mois"
            className="small-input"
          />
          <input
            type="text"
            placeholder="Année"
            className="small-input"
          />
        </div>

        <input
          type="text"
          placeholder="CVV"
          className="payment-input"
        />

        <button className="pay-btn">
          Confirmer et Payer 240 €
        </button>

        <p className="secure-text">
          🔒 Vos informations sont sécurisées.
        </p>

      </div>
    </div>
  );
};

export default Payment;