import React from "react";
import "./Players.css";

const Players = () => {
  const players = Array.from({ length: 12 });

  return (
    <div className="section">
      <h2 className="section-title">
        3. Composition de l'Équipe (12 Joueurs)
      </h2>

      <div className="players-grid">
        {players.map((_, i) => (
          <div key={i} className="player-card">
            <span className="player-label">Joueur {i + 1}</span>

            <div className="inputs-container">
              <input type="text" placeholder="Nom" />
              <input type="text" placeholder="Prénom" />
              <input type="text" placeholder="Âge" />
              <input type="text" placeholder="N° Maillot" />
            </div>

          </div>
        ))}
      </div>
    </div>
  );
};

export default Players;