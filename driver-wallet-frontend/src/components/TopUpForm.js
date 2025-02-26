import React, { useState } from 'react';
import { topUpWallet } from '../api';

const TopUpForm = ({ driverId, setBalance }) => {
  const [amount, setAmount] = useState('');
  const [error, setError] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (amount <= 0) {
      setError('Amount must be greater than zero');
      return;
    }

    try {
      const data = await topUpWallet(driverId, amount);
      setBalance(data.balance);
      setAmount('');
      setError('');
    } catch (error) {
      setError('Failed to top up wallet');
    }
  };

  return (
    <div className="topup-form">
      <h2>Top Up Wallet</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="number"
          value={amount}
          onChange={(e) => setAmount(e.target.value)}
          placeholder="Enter amount"
        />
        <button type="submit">Top Up</button>
      </form>
      {error && <div className="error">{error}</div>}
    </div>
  );
};

export default TopUpForm;
