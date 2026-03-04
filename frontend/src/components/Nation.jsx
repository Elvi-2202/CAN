import React from 'react';

const Nation = ({ value, onChange }) => {
  const nations = ["RD Congo", "Algérie", "Cameroun", "Côte d'Ivoire", "Maroc", "Sénégal", "DOM-TOM", "Reste du monde", "Tunisie", "Haïti"]; // [cite: 5]

  return (
    <div className="section">
      <h2 className="section-title">1. Informations Générales Équipe</h2>
      <div className="form-group">
        <label>Nation représentée *</label>
        <select value={value} onChange={(e) => onChange(e.target.value)} required>
          <option value="">Sélectionnez une nation</option>
          {nations.map(n => <option key={n} value={n}>{n}</option>)}
        </select>
      </div>
    </div>
  );
};

export default Nation;