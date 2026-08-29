# 📝 ProCodeBlogs

A containerized full-stack blogging platform built with **Laravel 11** and **PHP 8.2**, featuring rich-text editing, Google OAuth, author management, and a threaded comment system. Packaged with a production-ready **Docker** environment and automated with **GitHub Actions** CI/CD workflows.

[![PHP 8.2+](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)](https://php.net/)
[![Laravel 11](https://img.shields.io/badge/Laravel-11.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![GitHub Actions](https://img.shields.io/badge/CI%2FCD-GitHub_Actions-2088FF?logo=githubactions&logoColor=white)](https://github.com/features/actions)
[![Bootstrap 5](https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/vishch24/procodeblogs?tab=MIT-1-ov-file)

---

## ⚡ Key Engineering & DevOps Impact

* **Containerized Architecture:** Fully dockerized application environment using a multi-stage `Dockerfile` and `docker-compose.yml`, orchestrating PHP 8.3 FPM, custom Nginx routing (`conf/nginx`), and MySQL services for exact dev-to-prod environment parity.
* **Hardened Security & CVE Remediation:** Upgraded base runtime to PHP 8.3, patched upstream operating system CVEs, and resolved dependency vulnerabilities across `composer.lock` and `package-lock.json`.
* **Automated CI/CD Workflows:** Integrated GitHub Actions pipelines (`.github/workflows`) automating lint checks, dependency validation, static analysis, and PHPUnit test execution across every push and pull request.
* **Predictable Production Deployments:** Standardized startup routine via `start.sh` managing automated migrations, storage symlinks, asset publishing, and cache warmups across 40+ production deployment iterations.

---

## 📁 Repository Structure

```text
procodeblogs/
├── .github/workflows/    # GitHub Actions CI/CD workflows
├── conf/nginx/           # Custom Nginx reverse proxy configuration
├── app/
│   ├── Http/Controllers/ # Application controllers & business logic
│   ├── Models/           # Eloquent data models
│   └── Providers/        # Service providers
├── database/
│   ├── migrations/       # Schema definitions
│   └── seeders/          # Database seeders
├── resources/
│   ├── views/            # Blade templates
│   ├── css/              # Bootstrap styling assets
│   └── js/               # Alpine.js script bundles
├── routes/
│   └── web.php           # Application route definitions
├── Dockerfile            # Multi-stage production container build
├── docker-compose.yml    # Service orchestration (App, Nginx, MySQL)
├── start.sh              # Container bootstrap and migration script
└── tests/                # PHPUnit test suite

```

---

## 🛠 Tech Stack

| Layer | Technologies |
| --- | --- |
| **Backend** | Laravel 11, PHP 8.3, Eloquent ORM |
| **Frontend** | Blade, Bootstrap 5.3.3, Alpine.js 3.x, Vite 6 |
| **Rich Text** | Trix Editor (`tonysm/rich-text-laravel`) |
| **Auth & Security** | Laravel Breeze, Laravel Socialite (Google OAuth 2.0), Email Verification |
| **Database & Cache** | MySQL 8.0, Database-driven Sessions & Caches |
| **DevOps & Containers** | Docker, Docker Compose, Nginx (Alpine-based FastCGI proxy) |
| **CI/CD & Testing** | GitHub Actions, PHPUnit 11 |

---

## ✨ Application Features

* **Rich Text Publishing:** Trix-based editor supporting embedded images, code blocks, custom formatting, and clean attachment handling.
* **Dual Authentication:** Standard credential-based auth scaffolding (with mandatory email verification) alongside one-click Google OAuth 2.0 integration.
* **Role-Based Access Control (RBAC):** Distinct reader and author permissions with private post-management dashboards.
* **Threaded Commenting Engine:** Self-referential comment architecture supporting multi-level nested replies across articles.
* **SEO-Friendly Routing:** Dynamic slug-based post resolution with cached database reads.

---

## 🚀 Quickstart with Docker

### Prerequisites

* [Docker Desktop](https://www.docker.com/products/docker-desktop/) (Engine 24.0+ / Compose v2+)
* [Git](https://git-scm.com/install/)

### 1. Clone & Configure

```bash
git clone https://github.com/vishch24/procodeblogs.git
cd procodeblogs
cp .env.example .env

```

Update your `.env` with database and OAuth credentials:

```dotenv
APP_NAME=ProCodeBlogs
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

# Docker Database Configuration
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=procodeblogs
DB_USERNAME=procode_user
DB_PASSWORD=secret_password

# Google OAuth Credentials
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

```

### 2. Build & Launch Containers

```bash
docker compose up -d --build

```

### 3. Initialize Application

```bash
# Generate key and run migrations inside the app container
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
docker compose exec app php artisan storage:link

```

Access the application at `http://localhost:8000`.

---

## 💻 Local Development (Without Docker)

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup environment & key
cp .env.example .env
php artisan key:generate

# 3. Database migrations & symlink
php artisan migrate
php artisan storage:link

# 4. Compile assets & start development server
npm run build
php artisan serve

```

---

## 🔄 CI/CD Pipeline Overview

The project uses GitHub Actions workflows defined in `.github/workflows/` to enforce software quality gates:

```
[ Push ] 
   │
   ├──> Code Quality & Linting Checks (`pint`)
   ├──> Secret Scanning (`gitleaks`)
   ├──> Dependency Vulnerability Audit (`composer audit`)
   └──> Unit & Feature Test Suite Execution (`phpunit`)

```

---

## 🧪 Running Tests

Execute unit and feature tests locally or inside the Docker container:

```bash
# Local execution
php artisan test

# Inside Docker container
docker compose exec app php artisan test

```

---

## 📄 License

This project is licensed under the [MIT License](https://github.com/vishch24/procodeblogs?tab=MIT-1-ov-file).
