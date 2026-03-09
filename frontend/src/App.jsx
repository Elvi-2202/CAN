import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Home from "./components/Home/Home";
import Payment from "./components/Payement/Payement";
import "./App.css";

const App = () => {
  return (
    <Router>
      <Routes>

        <Route path="/" element={<Home />} />
        <Route path="/payment" element={<Payment />} />

      </Routes>
    </Router>
  );
};
export default App;