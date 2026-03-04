import React, { useState } from "react";
import "./App.css";

const nations = [
  "RD Congo",
  "Algérie",
  "Cameroun",
  "Côte d'Ivoire",
  "Maroc",
  "Sénégal",
  "DOM-TOM",
  "Reste du monde",
  "Tunisie",
  "Haïti"
];

const App = () => {
  const [nation, setNation] = useState("Algérie");

  const players = Array.from({ length: 12 });

  return (
    <div className="page-bg">
      <div className="container">
        <h1 className="main-title">Formulaire d’inscription d’équipe</h1>

        <form>

          {/* SECTION 1 */}
          <div className="section-title">1. Informations Générales Équipe</div>
          <div className="section-content">
            <div className="row">
              <label>
                Nation représentée <span className="red">*</span>
              </label>
              <select value={nation} onChange={(e) => setNation(e.target.value)}>
                {nations.map((n) => (
                  <option key={n}>{n}</option>
                ))}
              </select>
            </div>
          </div>

          {/* SECTION 2 */}
          <div className="section-title">2. Responsable d’Équipe</div>
          <div className="section-content manager-grid">
            {["Nom", "Prénom", "Téléphone", "Email"].map((field) => (
              <div className="input-row" key={field}>
                <label>
                  {field} <span className="red">*</span>
                </label>
                <input type="text" />
              </div>
            ))}

            <div className="input-row">
              <label>Ville</label>
              <input type="text" />
            </div>
          </div>

          {/* SECTION 3 */}
          <div className="section-title">
            3. Composition de l’Équipe (12 Joueurs)
          </div>

          <div className="players-grid">
            {players.map((_, i) => (
              <div key={i} className="player-line">
                <span className="player-label">Joueur {i + 1}</span>
                <input placeholder="Nom" />
                <input placeholder="Prénom" />
                <input placeholder="Âge" className="small" />
                <input placeholder="N° Maillot" className="small" />
              </div>
            ))}
          </div>

          {/* FOOTER */}
          <div className="footer-area">

            <div className="recap-box">
              <div className="recap-title">Récapitulatif</div>
              <div>Nation : <strong>{nation}</strong></div>
              <div>Nombre de joueurs : <strong>12</strong></div>
              <div>Prix par joueur : <strong>20 €</strong></div>
              <div className="total">
                Total à payer : <strong>240 €</strong>
              </div>
            </div>

            <div className="checkbox-area">
              <label>
                <input type="checkbox" /> Tous les joueurs sont informés.
              </label>
              <label>
                <input type="checkbox" /> Les informations sont exactes.
              </label>
              <label className="green-check">
                <input type="checkbox" /> J'accepte le règlement du tournoi <span className="red">*</span>
              </label>
            </div>

          </div>

          <button className="submit-btn">
            Payer et valider l'inscription
          </button>

        </form>
      </div>
    </div>
  );
};

export default App;