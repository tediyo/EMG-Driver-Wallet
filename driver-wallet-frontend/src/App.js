import React, { useState } from 'react';
import TopUpForm from './components/TopUpForm';
import BalanceDisplay from './components/BalanceDisplay';
import './App.css'; // Create a custom CSS file for styling

const App = () => {
  const [driverId] = useState(1); // Change this with the driver ID you want to use
  const [balance, setBalance] = useState(null);

  return (
    <div className="App">
      <h1>Driver Wallet System</h1>
      <TopUpForm driverId={driverId} setBalance={setBalance} />
      <BalanceDisplay driverId={driverId} />
    </div>
  );
};

export default App;
