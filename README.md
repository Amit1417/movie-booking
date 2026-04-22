# 🎟️ CineBook - Movie Ticket Booking System

A simple and complete **Movie Ticket Booking System** built with **PHP and MySQL** for DBMS mini project. Perfect for beginners!

---

## ✨ Features

### Admin Features
- Secure Admin Login (`admin@movie.com` / `admin123`)
- Add new movies with poster image upload
- View all added movies with available seats
- Manage movie details easily

### User Features
- Simple login using **Phone Number only** (No password/OTP required)
- Browse currently showing movies with posters
- Book tickets with user details (Name, Email, Aadhar/PAN)
- Real-time seat availability (auto-updates)
- Booking confirmation

### Technical Features
- Fully functional CRUD operations
- Image upload for movie posters
- Automatic seat deduction after booking
- Clean and responsive Bootstrap UI
- Proper database relationship (Foreign Key)

---

## 🛠️ Tech Stack

- **Frontend**: HTML, CSS, Bootstrap 5
- **Backend**: PHP
- **Database**: MySQL / MariaDB
- **Server**: XAMPP (Apache + MySQL)

---

## 📁 Project Structure
movie_booking/
├── db_connection.php          # Database connection
├── index.php                  # Home page
├── admin_login.php            # Admin login
├── admin_dashboard.php        # Admin panel
├── add_movie.php              # Add new movie
├── user_login.php             # User phone login
├── user_dashboard.php         # Show movies to user
├── book_ticket.php            # Booking form
├── process_booking.php        # Process booking
├── logout.php                 # Logout
└── uploads/                   # Movie posters folder

---

## 🚀 How to Run the Project

### Step 1: Setup XAMPP
1. Install and start **XAMPP**
2. Make sure **Apache** and **MySQL** are running (green)
3. MySQL is running on **Port 3307**

### Step 2: Create Database
1. Open phpMyAdmin (`http://localhost/phpmyadmin`)
2. Create a new database named **`movie_booking`**
3. Run the following SQL to create tables:

```sql
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    image VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) DEFAULT 250.00,
    total_seats INT DEFAULT 200,
    available_seats INT DEFAULT 200
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT,
    user_name VARCHAR(100),
    phone VARCHAR(15),
    email VARCHAR(100),
    id_proof_type ENUM('Aadhar', 'PAN'),
    id_proof_number VARCHAR(50),
    tickets_booked INT,
    total_amount DECIMAL(10,2),
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);
Step 3: Setup Project

Copy all project files into C:\xampp\htdocs\movie_booking
Make sure uploads folder exists inside the project

Step 4: Run

Open browser and go to:
http://localhost/movie_booking/index.php
Made For

DBMS (Database Management System) Mini Project
Beginner PHP + MySQL Students
