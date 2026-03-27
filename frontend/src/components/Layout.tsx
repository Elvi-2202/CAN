import { NavLink, Outlet } from "react-router-dom";

export default function Layout() {
  return (
    <div>
      <nav>
        <ul>
          <li>
            <NavLink to="/">Accueil</NavLink>
          </li>

          <li>
            <NavLink to="/teams">Équipes</NavLink>
          </li>

          <li>
            <NavLink to="/register">Inscription</NavLink>
          </li>

          <li>
            <NavLink to="/payment">Paiement</NavLink>
          </li>
        </ul>
      </nav>

      <hr />

      <main>
        <Outlet />
      </main>
    </div>
  );
}