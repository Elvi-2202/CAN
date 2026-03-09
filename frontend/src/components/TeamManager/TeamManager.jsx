import "./TeamManager.css";

const TeamManager = () => {
  return (

    <div className="section">

      <h2 className="section-title">
        2. Responsable d'Équipe
      </h2>

      <div className="manager-grid">

        <div className="form-group">
          <label>Nom *</label>
          <input type="text" />
        </div>

        <div className="form-group">
          <label>Prénom *</label>
          <input type="text" />
        </div>

        <div className="form-group">
          <label>Téléphone *</label>
          <input type="tel" />
        </div>

        <div className="form-group">
          <label>Email *</label>
          <input type="email" />
        </div>

        <div className="form-group">
          <label>Ville</label>
          <input type="text" />
        </div>

      </div>

    </div>

  );
};

export default TeamManager;