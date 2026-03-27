import { NavLink } from "react-router-dom";

export default function Navbar() {
  const linkStyle = ({ isActive }) => ({
    color: isActive ? "#4CAF50" : "#fff",
    textDecoration: "none",
    fontWeight: isActive ? "bold" : "normal",
  });

  return (
    <nav
      style={{
        background: "#1a1a1a",
        padding: "15px 30px",
        display: "flex",
        justifyContent: "space-between",
        alignItems: "center",
      }}
    >
      {/* Logo / Titre */}
      <h2 style={{ color: "#fff", margin: 0 }}>MyTournament</h2>

      {/* Liens */}
      <div style={{ display: "flex", gap: "20px" }}>
        <NavLink to="/" style={linkStyle}>
          Accueil
        </NavLink>

        <NavLink to="/teams" style={linkStyle}>
          Équipes
        </NavLink>

        <NavLink to="/TeamRegistrationForm" style={linkStyle}>
          Inscription
        </NavLink>

        <NavLink to="/payment" style={linkStyle}>
          Paiement
        </NavLink>
      </div>
    </nav>
  );
}