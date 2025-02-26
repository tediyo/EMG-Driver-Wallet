import React, { useState, useEffect } from 'react';
import { getBalance } from '../api';

const BalanceDisplay = ({ driverId }) => {
  const [balance, setBalance] = useState(null);
  const [status, setStatus] = useState('');

  useEffect(() => {
    const fetchBalance = async () => {
      try {
        const data = await getBalance(driverId);
        setBalance(data.balance);
        setStatus(data.status);
      } catch (error) {
        setBalance(null);
        setStatus('Error fetching balance');
      }
    };

    fetchBalance();
  }, [driverId]);

  return (
    <div className="balance-display">
      <h2>Current Balance</h2>
      {balance !== null ? (
        <div>
          <p>{balance} Birr</p>
          <p>Status: {status}</p>
        </div>
      ) : (
        <p>Loading balance...</p>
      )}
    </div>
  );
};

export default BalanceDisplay;
