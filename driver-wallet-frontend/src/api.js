import axios from 'axios';

const API_URL = 'http://localhost:8000/api'; // Update with your backend URL

export const topUpWallet = async (driverId, amount) => {
  try {
    const response = await axios.post(`${API_URL}/wallet/topup`, {
      driver_id: driverId,
      amount: amount
    });
    return response.data;
  } catch (error) {
    console.error('Error topping up wallet:', error);
    throw error;
  }
};

export const getBalance = async (driverId) => {
  try {
    const response = await axios.get(`${API_URL}/wallet/balance/${driverId}`);
    return response.data;
  } catch (error) {
    console.error('Error fetching balance:', error);
    throw error;
  }
};
