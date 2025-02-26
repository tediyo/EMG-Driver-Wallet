Here's a detailed `README.md` file for the Driver Wallet System project, covering both the backend (Laravel) and frontend (React) parts, including file structures, setup instructions, and other important details.

---
# Tewodros Berhanu
# Software Developer | QA Tester 
# 0947087598 | tewodrosberhanu19@gmail.com

# Driver Wallet System

This is a full-stack application for a Driver Wallet System, built with **Laravel** for the backend and **React** for the frontend. It includes features for wallet top-up, balance check, and a status check for ride acceptance eligibility.

---

## Table of Contents
- [Features](#features)
- [Tech Stack](#tech-stack)
- [File Structure](#file-structure)
  - [Backend (Laravel)](#backend-laravel)
  - [Frontend (React)](#frontend-react)
- [Setup Instructions](#setup-instructions)
  - [Backend Setup](#backend-setup)
  - [Frontend Setup](#frontend-setup)
- [API Endpoints](#api-endpoints)
- [Running Tests](#running-tests)
- [License](#license)

---

## Features
- Wallet Top-Up: Drivers can add money to their wallet.
- Balance Check: Drivers can check their current balance.
- Ride Acceptance Status: Checks if the balance is sufficient for accepting rides.
- Responsive UI with a modern design.
- Integration between frontend and backend using RESTful APIs.

---

## Tech Stack
### Backend:
- Laravel 12.0.1 (PHP Framework)
- MySQL (Database)

### Frontend:
- React.js (Frontend Framework)
- Axios (For API Requests)
- Tailwind CSS (For Modern UI Design)

---

## File Structure
### Backend (Laravel)
```
driver-wallet-backend/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── WalletController.php
│   ├── Models/
│       └── Wallet.php
│
├── config/
│   └── database.php
│
├── database/
│   ├── migrations/
│   │   └── 2025_02_25_000000_create_wallets_table.php
│   └── seeders/
│       └── WalletSeeder.php
│
├── routes/
│   └── api.php
│
└── tests/
    └── Feature/
        └── WalletControllerTest.php
```

### Frontend (React)
```
driver-wallet-frontend/
│
├── public/
│   └── index.html
│
├── src/
│   ├── __tests__/
│   │   ├── TopUpForm.test.js
│   │   └── BalanceCheck.test.js
│   │
│   ├── components/
│   │   ├── TopUpForm.js
│   │   └── BalanceCheck.js
│   │
│   ├── App.js
│   ├── index.js
│   └── api/
│       └── walletApi.js
│
└── package.json
```

---

## Setup Instructions

### Backend Setup

1. **Clone the Repository:**
```bash
git clone https://github.com/your-username/driver-wallet-backend.git
cd driver-wallet-backend
```

2. **Install Dependencies:**
```bash
composer install
```

3. **Configure Environment:**
- Copy `.env.example` to `.env`
- Update the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=driver_wallet
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

4. **Generate Application Key:**
```bash
php artisan key:generate
```

5. **Run Migrations and Seeders:**
```bash
php artisan migrate --seed
```

6. **Start the Server:**
```bash
php artisan serve
```

### Frontend Setup

1. **Navigate to Frontend Directory:**
```bash
cd ../driver-wallet-frontend
```

2. **Install Dependencies:**
```bash
npm install
```

3. **Start the Development Server:**
```bash
npm start
```

4. The frontend should now be accessible at `http://localhost:3000`

---

## API Endpoints

### Wallet
- **Top-Up Wallet**  
  - Endpoint: `POST /api/wallet/topup`
  - Request Body:
    ```json
    {
      "driver_id": 1,
      "amount": 100
    }
    ```
  - Response:
    ```json
    {
      "message": "Top-up successful",
      "balance": 150
    }
    ```

- **Check Balance**
  - Endpoint: `GET /api/wallet/balance/{driver_id}`
  - Response:
    ```json
    {
      "balance": 150,
      "status": "Can accept rides"
    }
    ```

---

## Running Tests

### Backend (Laravel)

```bash
php artisan test
```

### Frontend (React)

```bash
npm test
```

- Tests are located in the `__tests__` folder for React components and in the `tests/Feature` folder for Laravel.

---

## License
This project is licensed under the MIT License.

---

