import "./Nation.css";

const Nation = ({ nation, setNation }) => {
  const nations = [
    "RD Congo",
    "Algérie",
    "Cameroun",
    "Côte d'Ivoire",
    "Maroc",
    "Sénégal",
    "DOM-TOM",
    "Reste du monde",
    "Tunisie"
  ];

  return (
    <div className="section">
      <h2 className="section-title">
        1. Informations Générales Équipe
      </h2>

      <div className="form-group">
        <label>Nation représentée *</label>

        <select
          value={nation}
          onChange={(e) => setNation(e.target.value)}
        >
          <option value="">Choisir une nation</option>

          {nations.map((n) => (
            <option key={n} value={n}>
              {n}
            </option>
          ))}
        </select>
      </div>
    </div>
  );
};

export default Nation;