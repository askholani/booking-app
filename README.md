<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/your-repo/actions">
        <img src="https://github.com/your-repo/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/your-package">
        <img src="https://img.shields.io/packagist/dt/your-package" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/your-package">
        <img src="https://img.shields.io/packagist/v/your-package" alt="Latest Stable Version">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/packagist/l/your-package" alt="License">
    </a>
</p>

# Booking-App

**Booking-App** is a web application for booking PlayStation rentals, integrated with the **Midtrans** payment gateway. It is built using **Laravel 11**, **Tailwind CSS**, **Flowbite**, and **MySQL**.

## Features

### User Roles

- **Customer:**

  - Book a PlayStation for a specific time slot.
  - Update profile information.
  - Make secure payments via **Midtrans**.

- **Admin:**
  - Manage PlayStation data (**CRUD** operations).
  - Manage user data (**CRUD** operations).
  - View and manage booking records.
  - Monitor and display payment transactions.

## Midtrans Payment Integration

To enable Midtrans payment integration, configure your `.env` file with the required credentials:

```env
MIDTRANS_MERCHANT_ID=your_merchant_id
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_SERVER_KEY=your_server_key
```

Ensure you have a **Midtrans account** and have obtained valid API keys for payment processing.

## Technology Stack

- **Backend:** Laravel 11
- **Frontend:** Tailwind CSS, Flowbite
- **Database:** MySQL
- **Payment Gateway:** Midtrans

## Installation & Setup

### Prerequisites

- PHP 8.x
- Composer
- Node.js & npm
- MySQL

### Steps to Install

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-repo/booking-app.git
   cd booking-app
   ```

2. **Install Dependencies**

   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment Variables**

   - Copy `.env.example` to `.env`
   - Configure database and Midtrans credentials

4. **Run Migrations**

   ```bash
   php artisan migrate
   ```

5. **Start the Application**
   ```bash
   php artisan serve
   ```

Your **Booking-App** is now ready to use! 🚀

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any improvements.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
