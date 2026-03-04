import React from 'react';

const Players = ({ players, onChange }) => {
  const updatePlayer = (index, field, value) => {
    const newPlayers = [...players];
    newPlayers[index][field] = value;
    onChange(newPlayers);
  };

  return (
    <div className="section">
      <h2 className="section-title">3. Composition de l'Équipe (12 Joueurs)</h2>
      <div className="players-grid">
        {players.map((p, i) => (
          <div key={i} className="player-row">
            <span className="player-label">Joueur {i + 1}</span>
            <input placeholder="Nom" value={p.nom} onChange={(e) => updatePlayer(i, 'nom', e.target.value)} required />
            <input placeholder="Prénom" value={p.prenom} onChange={(e) => updatePlayer(i, 'prenom', e.target.value)} required />
            <input className="small-input" placeholder="Âge" value={p.age} onChange={(e) => updatePlayer(i, 'age', e.target.value)} required />
            <input className="small-input" placeholder="N°" value={p.num} onChange={(e) => updatePlayer(i, 'num', e.target.value)} />
          </div>
        ))}
      </div>
    </div>
  );
};

export default Players;