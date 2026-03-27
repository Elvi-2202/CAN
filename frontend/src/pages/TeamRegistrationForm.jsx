import { useState } from "react";

export default function TeamRegistrationForm() {
  const [formData, setFormData] = useState({
    nation_id: "",
    manager: {
      firstName: "",
      lastName: "",
      email: "",
      phone: "",
      city: "",
    },
    players: Array.from({ length: 12 }, (_, index) => ({
      firstName: "",
      lastName: "",
      age: "",
      jerseyNumber: index + 1,
    })),
    consent: {
      accepted: false,
      termsVersion: "v1",
    },
  });

  const [loading, setLoading] = useState(false);
  const [responseMessage, setResponseMessage] = useState("");
  const [errors, setErrors] = useState({});

  const handleManagerChange = (e) => {
    const { name, value } = e.target;

    setFormData((prev) => ({
      ...prev,
      manager: {
        ...prev.manager,
        [name]: value,
      },
    }));
  };

  const handlePlayerChange = (index, e) => {
    const { name, value } = e.target;

    const updatedPlayers = [...formData.players];
    updatedPlayers[index] = {
      ...updatedPlayers[index],
      [name]: value,
    };

    setFormData((prev) => ({
      ...prev,
      players: updatedPlayers,
    }));
  };

  const handleConsentChange = (e) => {
    const { checked } = e.target;

    setFormData((prev) => ({
      ...prev,
      consent: {
        ...prev.consent,
        accepted: checked,
      },
    }));
  };

  const handleNationChange = (e) => {
    setFormData((prev) => ({
      ...prev,
      nation_id: e.target.value,
    }));
  };

const handleSubmit = async (e) => {
  e.preventDefault();
  setLoading(true);
  setResponseMessage("");
  setErrors({});

  try {
    const payload = {
      ...formData,
      nation_id: Number(formData.nation_id),
      players: formData.players.map((player) => ({
        ...player,
        age: Number(player.age),
        jerseyNumber: Number(player.jerseyNumber),
      })),
    };

    const response = await fetch("http://127.0.0.1:8000/api/teams/register", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    });

    const result = await response.json();

    console.log("status:", response.status);
    console.log("result:", result);

    if (!response.ok) {
      setResponseMessage(result.message || "Une erreur est survenue");
      setErrors(result.errors || {});
      return;
    }

    setResponseMessage("Équipe enregistrée avec succès !");
  } catch (error) {
    setResponseMessage("Erreur réseau ou serveur");
    console.error(error);
  } finally {
    setLoading(false);
  }
};
  return (
    <div style={{ maxWidth: "1100px", margin: "0 auto", padding: "20px" }}>
      <h1>Inscription équipe</h1>

      {responseMessage && (
        <p style={{ marginBottom: "20px", fontWeight: "bold" }}>
          {responseMessage}
        </p>
      )}

      <form onSubmit={handleSubmit}>
        <section style={{ marginBottom: "30px" }}>
          <h2>Nation</h2>
          <select
            value={formData.nation_id}
            onChange={handleNationChange}
            required
          >
            <option value="">-- Choisir une nation --</option>
            <option value="1">France</option>
            <option value="2">Congo</option>
            <option value="3">Cameroun</option>
          </select>
          {errors["nation_id"] && <p>{errors["nation_id"]}</p>}
        </section>

        <section style={{ marginBottom: "30px" }}>
          <h2>Manager</h2>

          <input
            type="text"
            name="firstName"
            placeholder="Prénom"
            value={formData.manager.firstName}
            onChange={handleManagerChange}
          />
          {errors["manager.firstName"] && <p>{errors["manager.firstName"]}</p>}

          <input
            type="text"
            name="lastName"
            placeholder="Nom"
            value={formData.manager.lastName}
            onChange={handleManagerChange}
          />
          {errors["manager.lastName"] && <p>{errors["manager.lastName"]}</p>}

          <input
            type="email"
            name="email"
            placeholder="Email"
            value={formData.manager.email}
            onChange={handleManagerChange}
          />
          {errors["manager.email"] && <p>{errors["manager.email"]}</p>}

          <input
            type="text"
            name="phone"
            placeholder="Téléphone"
            value={formData.manager.phone}
            onChange={handleManagerChange}
          />
          {errors["manager.phone"] && <p>{errors["manager.phone"]}</p>}

          <input
            type="text"
            name="city"
            placeholder="Ville"
            value={formData.manager.city}
            onChange={handleManagerChange}
          />
        </section>

        <section style={{ marginBottom: "30px" }}>
          <h2>Joueurs</h2>

          {formData.players.map((player, index) => (
            <div
              key={index}
              style={{
                border: "1px solid #ccc",
                padding: "15px",
                marginBottom: "15px",
                borderRadius: "8px",
              }}
            >
              <h3>Joueur {index + 1}</h3>

              <input
                type="text"
                name="firstName"
                placeholder="Prénom"
                value={player.firstName}
                onChange={(e) => handlePlayerChange(index, e)}
              />
              {errors[`players.${index}.firstName`] && (
                <p>{errors[`players.${index}.firstName`]}</p>
              )}

              <input
                type="text"
                name="lastName"
                placeholder="Nom"
                value={player.lastName}
                onChange={(e) => handlePlayerChange(index, e)}
              />
              {errors[`players.${index}.lastName`] && (
                <p>{errors[`players.${index}.lastName`]}</p>
              )}

              <input
                type="number"
                name="age"
                placeholder="Âge"
                value={player.age}
                onChange={(e) => handlePlayerChange(index, e)}
              />
              {errors[`players.${index}.age`] && (
                <p>{errors[`players.${index}.age`]}</p>
              )}

              <input
                type="number"
                name="jerseyNumber"
                placeholder="Numéro"
                value={player.jerseyNumber}
                onChange={(e) => handlePlayerChange(index, e)}
              />
              {errors[`players.${index}.jerseyNumber`] && (
                <p>{errors[`players.${index}.jerseyNumber`]}</p>
              )}
            </div>
          ))}
        </section>

        <section style={{ marginBottom: "30px" }}>
          <h2>Consentement</h2>

          <label>
            <input
              type="checkbox"
              checked={formData.consent.accepted}
              onChange={handleConsentChange}
            />
            J’accepte le règlement
          </label>

          {errors["consent.accepted"] && <p>{errors["consent.accepted"]}</p>}
        </section>

        <button type="submit" disabled={loading}>
          {loading ? "Envoi..." : "Envoyer"}
        </button>
      </form>
    </div>
  );
}