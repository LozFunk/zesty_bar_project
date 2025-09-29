# Zesty Cocktail Bar Project

## Overview
Zesty Cocktail Bar is a PHP-based web application for a cocktail bar. It features a public website and an admin dashboard for managing reservations, menu items, and contact messages.

## Features
- Public pages: Home, About, Menu, Contact, Reservation, Impressum
- Admin dashboard: Login/logout, manage menu, view reservations, view contact messages
- Responsive design with custom fonts and images
- MySQL database integration

## Project Structure

- `index.php` — Main entry point, handles routing for public pages.
- `inc/` — Shared PHP includes (`header.php`, `footer.php`, `functions.php`).
- `config/db.php` — Database connection setup.
- `css/` — Stylesheets for different pages and components.
- `fonts/` — Font files and licenses.
- `images/` — Images used throughout the site.
- `pages/` — Public-facing pages (`home.php`, `about.php`, `menu.php`, `contact.php`, `reservation.php`, `impressum.php`).
- `admin/` — Admin dashboard and management pages:
  - `login.php` — Admin login.
  - `logout.php` — Admin logout.
  - `dashboard.php` — Admin navigation.
  - `admin_menu.php` — Manage menu items.
  - `admin_reservations.php` — View reservations.
  - `admin_contacts.php` — View contact messages.
- `zesty_bar_project.sql` — SQL dump for database schema and sample data.

## Database
Import `zesty_bar_project.sql` into your MySQL server. Main tables:
- `admin_users`: Admin credentials
- `menu`: Cocktail menu items
- `reservations`: Guest reservations
- `guest_feedback`: Contact form submissions

## Setup Instructions

1. Clone or copy the project to your PHP server directory.
2. Import `zesty_bar_project.sql` into your MySQL database.
3. Update `config/db.php` with your database credentials.
4. Access the site via your local server (e.g., `http://localhost/php/zesty_bar_project/`).
5. Admin dashboard is at `/admin/login.php`.

## License
Font licenses are included in the `fonts/` directory.

---

For further details, see the documentation section
