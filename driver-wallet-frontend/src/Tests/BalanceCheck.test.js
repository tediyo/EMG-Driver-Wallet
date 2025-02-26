import React from 'react';
import { render, screen } from '@testing-library/react';
import BalanceCheck from '../components/BalanceCheck';

describe('BalanceCheck Component', () => {
  test('displays balance and status', () => {
    const balance = 100;
    const status = 'Can accept rides';
    
    render(<BalanceCheck balance={balance} status={status} />);
    
    expect(screen.getByText(/Balance:/i)).toBeInTheDocument();
    expect(screen.getByText(/100/i)).toBeInTheDocument();
    expect(screen.getByText(/Can accept rides/i)).toBeInTheDocument();
  });
});
//////////////////////////////TEST SUMMARY /////////////////////////
   // alanceCheck.test.js: Tests balance and status display //