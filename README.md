# Next.js + Laravel Starter Template

This template demonstrates how to use **Laravel** (as a backend API) and **Next.js** (as a frontend) together. It includes a demo user API, database seeding, and a Next.js page that fetches user data from the Laravel backend.

---

## Versions Used

- **Laravel:** 10.x (check `composer.json` for exact version)
- **Next.js:** 14.x (check `package.json` for exact version)

---

## Folder Structure

- `laravel-backend/` — Laravel API backend
- `nextjs-frontend/` — Next.js frontend

---

## Getting Started

### 1. Backend (Laravel)

#### Prerequisites

- PHP >= 8.1
- Composer
- MySQL (or compatible DB)

#### Setup

1. Copy `.env.example` to `.env` and configure your database settings.
2. Install dependencies:
   ```sh
   composer install
   ```
3. Generate application key:
   ```sh
   php artisan key:generate
   ```
4. Run migrations and seed demo data:
   ```sh
   php artisan migrate --seed
   ```
   This will create the tables and insert 10 demo users (see `UsersTableSeeder`).
5. Start the Laravel server:
   ```sh
   php artisan serve
   ```
   By default, the API will be available at `http://localhost:8000`.

---

### 2. Frontend (Next.js)

#### Prerequisites

- Node.js >= 18
- npm or yarn

#### Setup

1. Install dependencies:
   ```sh
   npm install
   # or
   yarn install
   ```
2. Start the Next.js development server:
   ```sh
   npm run dev
   # or
   yarn dev
   ```
3. Visit `http://localhost:3000/users` to see the user list fetched from the Laravel API.

---

## API Endpoint

- `GET /api/users` — Returns a list of users (id and name)

---

## Where to View the API and Fetched Data

- **View the API directly:**

  - After starting the Laravel server, open your browser and go to:
    - [http://localhost:8000/api/users](http://localhost:8000/api/users)
  - This will show the JSON data for all demo users from your MySQL database.

- **View the fetched data in Next.js:**
  - After starting the Next.js development server, open your browser and go to:
    - [http://localhost:3000/users](http://localhost:3000/users)
  - This page displays the user list fetched from the Laravel API.

---

## Notes

- Make sure the Laravel backend is running and accessible from the Next.js frontend. If running on different hosts/ports, you may need to adjust the API URL in `nextjs-frontend/app/users/page.tsx`.
- CORS is enabled by default in Laravel 10, but you can configure it in `laravel-backend/config/cors.php` if needed.

---
