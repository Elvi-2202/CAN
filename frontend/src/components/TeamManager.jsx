import React from 'react';

const TeamManager = ({ data, onChange }) => {
  const handleChange = (e) => {
    onChange({ ...data, [e.target.name]: e.target.value });
  };

  return (
    <div className="section">
      <h2 className="section-title">2. Responsable d'Équipe</h2>
      <div className="grid-manager">
        <div className="field"><span>Nom *</span><input name="nom" value={data.nom} onChange={handleChange} required /></div>
        <div className="field"><span>Prénom *</span><input name="prenom" value={data.prenom} onChange={handleChange} required /></div>
        <div className="field"><span>Téléphone *</span><input name="tel" value={data.tel} onChange={handleChange} required /></div>
        <div className="field"><span>Email *</span><input name="email" type="email" value={data.email} onChange={handleChange} required /></div>
        <div className="field"><span>Ville</span><input name="ville" value={data.ville} onChange={handleChange} /></div>
      </div>
    </div>
  );
};

export default TeamManager;