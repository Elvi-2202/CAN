import { useEffect, useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";

import TeamRegistrationForm from "./pages/TeamRegistrationForm";
import Home from "./pages/Home"; 

function App() {
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
        <BrowserRouter>
            <Routes>  
                <Route path="/" element={<Home />} />
                <Route path="/teams" element={<div>Page des équipes</div>} />
                <Route path="/TeamRegistrationForm" element={<TeamRegistrationForm />} />
                <Route path="/payment" element={<div>Page de paiement</div>} />

            </Routes>
        </BrowserRouter>
      </>
  );
}


export default App;