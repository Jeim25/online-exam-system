# Online Examination System

🚀 **Live Demo:** [https://online-exam-system-production-1lkgux.laravel.cloud/](https://online-exam-system-production-1lkgux.laravel.cloud/)

A multi-role web application for conducting and managing online examinations, built with Laravel 11 and Supabase (PostgreSQL).

---

## Features

### Admin
- Manage teacher and student accounts
- Monitor all exams and system activity
- Full CRUD control over system users

### Teacher
- Create and manage exams and question banks
- Configure exam settings (time limits, availability)
- View student results and performance analytics

### Student *(in progress)*
- Take timed exams with automated multiple-choice scoring
- View personal results and exam history

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11, PHP |
| Frontend | Tailwind CSS, Alpine.js, Blade |
| Database | Supabase (PostgreSQL) |
| Auth | Laravel custom auth + role middleware |

---

## Architecture

- **Three-role system** — Admin, Teacher, Student — enforced via custom `RoleMiddleware` on all routes
- **Supabase PostgreSQL** connected via SSL using the Session Pooler (`aws-1-ap-southeast-1.pooler.supabase.com`) with `DB_SSLMODE=require`
- **Blade + Tailwind CSS** for all views with dedicated pages per role panel (no modal-heavy UI)

---

## Local Setup

### Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- Supabase account (or local PostgreSQL)

### Installation

```bash
# Clone the repository
git clone [https://github.com/Jeim25/online-exam-system.git](https://github.com/Jeim25/online-exam-system.git)
cd online-exam-system

# Install dependencies
composer install
npm install && npm run dev

# Environment setup
cp .env.example .env
php artisan key:generate
