# 🏍️ Horizon Rentals

**Horizon Rentals** is a fully responsive and animated web-based Motorcycle/Scooty rental management system. Built using HTML, CSS, JavaScript, PHP, and MySQL, it features complete CRUD functionality for managing vehicles, bookings, and user queries. Designed as a learning project and potentially for academic submission, it offers dynamic content management and an intuitive admin panel—all with a premium visual layout.

---

## ✨ Features

- 🔁 Full **CRUD operations** for:
  - Vehicle listings
  - User bookings
  - Contact/FAQ queries
- 🎛️ Admin panel to add, update, or delete entries directly from the browser
- 🗃️ **Dynamic homepage** that pulls vehicle data from the database
- 📝 Functional **booking** and **query forms** with data saving to MySQL
- 🎨 Modern, responsive layout with animations and component-based page design
- 🧠 Search-suggest input box for city names (non-functional)

---

## 📸 Visuals

![Screenshot 2025-05-16 152502](https://github.com/user-attachments/assets/869cb0d5-caef-4f71-8360-80a6952e93fb)

---

## 🧰 Tech Stack

| Layer     | Technologies Used           |
|-----------|-----------------------------|
| Frontend  | HTML5, CSS3                 |
| Backend   | JavaScript, PHP             |
| Database  | MySQL    |

---

## 🛠️ Installation & Setup

### 🔧 Prerequisites

- XAMPP or similar local server (with Apache & MySQL)
- Basic knowledge of PHP and SQL
- Git (optional, for cloning repo)

### 📄 Setup Steps

1. **Clone or fork** the repository
2. Copy it to your `htdocs/` directory in XAMPP
3. Start **Apache** and **MySQL** via the XAMPP Control Panel
4. Navigate to `http://localhost/phpmyadmin`
5. Create a database named: `horizonrentals`
6. Import the SQL file located at: `horizon_rentals/sqlFile/horizonrental.sql`
7. Access the main website via: `http://localhost/horizon_rentals/`
8. Access the admin dashboard via: `http://localhost/horizon_rentals/admin/`

> 🔐 Admin login details can be found in:  
> `horizon_rentals/admin/README FIRST !!.txt`

---

## 🧑‍💻 Usage

- Visitors explore available vehicles pulled dynamically from the DB
- Use the **booking form** to submit rental details (saved in DB)
- Use the **FAQ/contact form** to send queries
- Admin can log in to manage all system data (vehicles, bookings, and queries)

---

## 📁 Folder Structure 


```plaintext
Horizon_Rentals
├── assets/              # Static files
│   ├── css/
│   ├── js/
│   ├── Fonts/
│   ├── Logo/
│   └── images/
├── includes/            # Common PHP
│   ├── about.php
│   ├── booking-page.php
│   ├── contact_faq.php
│   ├── cities.json
│   └── sign-in-page.php
├── admin/               # Admin-only dashboard and management tools
│   ├── assets/
│   └──  includes/
├── sqlFile/                 # Database schema
│   └── horizonrental.sql
├── README.md
├── Index.php
└── LICENSE.md
```

---

## 🙌 Acknowledgments

- Project by **coder-dev-sys**
- Slight assistance via AI-coding tools

---

> 🛠 Need a reference for PHP-MySQL CRUD? Horizon Rentals is your solid academic example.
