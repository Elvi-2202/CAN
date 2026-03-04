import React from 'react';

const Summary = ({ nation, total, conditions, onCheck }) => {
  return (
    <div className="summary-container">
      <div className="recap-box">
        <h3>Récapitulatif</h3>
        <p>Nation : <strong>{nation || '-'}</strong></p>
        <p>Nombre de joueurs : <strong>12</strong></p>
        <p>Prix par joueur : <strong>20 €</strong></p>
        <p className="total">Total à payer : <strong>{total} €</strong></p>
      </div>

      <div className="conditions-box">
        <label><input type="checkbox" checked={conditions.info} onChange={() => onCheck('info')} required /> Tous les joueurs sont informés.</label>
        <label><input type="checkbox" checked={conditions.exact} onChange={() => onCheck('exact')} required /> Les informations sont exactes.</label>
        <label className="accept-rules"><input type="checkbox" checked={conditions.rules} onChange={() => onCheck('rules')} required /> J'accepte le règlement du tournoi *</label>
      </div>
    </div>
  );
};

export default Summary;