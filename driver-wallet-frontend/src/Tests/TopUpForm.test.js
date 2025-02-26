import React from 'react';
import { render, screen, fireEvent } from '@testing-library/react';
import TopUpForm from '../components/TopUpForm';

describe('TopUpForm Component', () => {
  test('renders form inputs and button', () => {
    render(<TopUpForm />);
    
    expect(screen.getByLabelText(/Driver ID/i)).toBeInTheDocument();
    expect(screen.getByLabelText(/Amount/i)).toBeInTheDocument();
    expect(screen.getByRole('button', { name: /Top Up/i })).toBeInTheDocument();
  });

  test('submits form with correct values', () => {
    const mockSubmit = jest.fn();
    render(<TopUpForm onSubmit={mockSubmit} />);

    fireEvent.change(screen.getByLabelText(/Driver ID/i), {
      target: { value: '1' }
    });
    fireEvent.change(screen.getByLabelText(/Amount/i), {
      target: { value: '100' }
    });
    fireEvent.click(screen.getByRole('button', { name: /Top Up/i }));

    expect(mockSubmit).toHaveBeenCalledWith({
      driver_id: '1',
      amount: '100'
    });
  });
});
