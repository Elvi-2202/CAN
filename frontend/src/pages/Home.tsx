import { useEffect, useState } from "react";
import Navbar from "../components/Navbar";
// import Navbar from "../components/Navbar";

export default function Home() {
  const [message, setMessage] = useState("Chargement...");
  const [error, setError] = useState("");

  useEffect(() => {
    fetch("http://localhost:8000/api/test")
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Erreur HTTP : ${response.status}`);
        }
        return response.json();
      })
      .then((data) => {
        setMessage(data.message);
      })
      .catch((err) => {
        setError(err.message);
      });
  }, []);

  return (
    <>  
    <Navbar />
    <div>
      <div style={{ padding: "2rem" }}>
        <h1>Test connexion API Symfony + Reactfrom home page</h1>
        {error ? <p style={{ color: "red" }}>{error}</p> : <p>{message}</p>}
        <p>PAGE HOME</p>
      </div>
    </div>

    </>
  );
}