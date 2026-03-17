import { Link, Outlet } from "react-router-dom";

export default function Layout() {
  return (
    <div>
      <nav>
        <ul>
          <li><Link to="/">Accueil</Link></li>
          <li><Link to="/teams">Équipe</Link></li>
          <li><Link to="/payment">Paiement</Link></li>
        </ul>
      </nav>

      <hr />

      <main>
        <Outlet />
      </main>
    </div>
  );
}