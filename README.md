Booking-App
Booking-App is a web application designed for booking PlayStation rentals, seamlessly integrated with the Midtrans payment gateway. The application is built using Laravel 11, Tailwind CSS, Flowbite, and MySQL to ensure a smooth user experience and efficient data management.

Features
User Roles
The application includes two main user roles:

Customer
Book a PlayStation for a specific time slot.
Update their profile information.
Make secure payments via Midtrans.

Admin
Manage PlayStation data (Create, Read, Update, Delete - CRUD).
Manage user data (CRUD).
View and manage booking records.
Monitor and display payment transactions.

Midtrans Payment Integration
The Customer role is integrated with Midtrans for secure and efficient payment processing. To enable this feature, you need to configure your .env file with the following Midtrans credentials:

env
Copy
Edit
MIDTRANS_MERCHANT_ID=your_merchant_id
MIDTRANS_CLIENT_KEY=your_client_key
MIDTRANS_SERVER_KEY=your_server_key
Ensure you have a valid Midtrans account and have obtained the necessary API keys to process payments successfully.

Technology Stack
Backend: Laravel 11
Frontend: Tailwind CSS, Flowbite
Database: MySQL
Payment Gateway: Midtrans
