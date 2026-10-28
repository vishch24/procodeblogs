# 📝 ProCodeBlogs

A **Laravel 12** blogging platform, used as a hands-on **DevSecOps** project: containerized with **Docker**, tested and security-scanned by **GitHub Actions** CI/CD workflows, with a **GitOps** deployment to **k3s** on **AWS EC2** via **ArgoCD**.

[![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![GitHub Actions](https://img.shields.io/badge/CI%2FCD-GitHub_Actions-2088FF?logo=githubactions&logoColor=white)](https://github.com/features/actions)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white)](https://php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)](https://laravel.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/vishch24/procodeblogs?tab=MIT-1-ov-file)

---

## 💡 What this project demonstrates 

| Area | What is implemented |
| --- | --- |
| **Containers** | Multi-stage Dockerfiles for PHP-FPM (Alpine) and Nginx; Docker Compose stack with PHP-FPM, Nginx, MySQL 8.0 and Redis |
| **Health checks** | Compose health checks on all backing services; startup is ordered with `depends_on: service_healthy` (Nginx waits for PHP-FPM, PHP-FPM waits for MySQL and Redis) |
| **CI** | Six reusable GitHub Actions workflows, orchestrated by a single `ci.yml` |
| **Matrix builds** | Lint, dependency audit and tests run across PHP 8.2, 8.3 and 8.4; Docker lint/scan/push run per image (nginx, php-fpm) |
| **DevSecOps** | Gitleaks (secrets), Composer Audit (dependencies), Hadolint (Dockerfiles), Trivy (image CVEs, HIGH and CRITICAL) |
| **Delivery** | Images pushed to Docker Hub only after every other CI job passes |
| **Runtime hygiene** | PHP-FPM runs as non-root `www-data`; entrypoint waits for MySQL, runs migrations, caches config and routes |

---

## 📊 Architecture

<img src="https://github.com/vishch24/procodeblogs/tree/main/pics/procodeblogs-architecture-diagram.png" width="100%">

Nginx serves compiled frontend assets and forwards `.php` requests to `php-fpm:9000`. Config lives in `docker/nginx/nginx.conf`.

---

## 📁 Repository Structure

```text
procodeblogs/
├── .github/workflows/    # GitHub Actions CI/CD workflows
├── app/ routes/ resources/ database/ tests/   # Laravel application
├── conf/nginx/           # Custom Nginx reverse proxy configuration
├── docker/
│   ├── nginx/             # Dockerfile (asset build + nginx:alpine) and nginx.conf
│   └── php-fpm/           # Dockerfile, entrypoint.sh, FPM status-path
├── docker-compose.yml    # Service orchestration (nginx, php-fpm, mysql, redis)
├── tests/                # PHPUnit test suite
├── CI_PIPELINE.md         # CI Pipeline design notes
└── db.sql                 # Initial MySQL seed, mounted on first start
```

---

## 🛠 Tech Stack

| Layer | Technologies |
| --- | --- |
| **Backend** | Laravel 12, PHP 8.3, Eloquent ORM |
| **Frontend** | Blade, Bootstrap 5.3.3, Alpine.js 3.x, Vite 6 |
| **Rich Text** | Trix Editor (`tonysm/rich-text-laravel`) |
| **Auth & Security** | Laravel Breeze, Laravel Socialite (Google OAuth 2.0), Email Verification |
| **Database & Cache** | MySQL 8.0, Database-driven Sessions & Caches |
| **DevOps & Containers** | Docker, Docker Compose, Nginx (Alpine-based FastCGI proxy) |
| **CI/CD & Testing** | GitHub Actions, DevSecOps Pipeline, PHPUnit 11 |

---

## 🛣️ Roadmap: GitOps on k3s + ArgoCD

- [x] Containerize the app (multi-stage Dockerfiles, Compose, health checks)
- [x] CI pipeline with linting, secret scanning, dependency audit, tests and image scanning
- [x] Push images to Docker Hub from CI
- [ ] Provision AWS EC2 and install k3s
- [ ] Install ArgoCD on k3s
- [ ] Kubernetes manifests in `/k8s`: Deployments (php-fpm, nginx, MySQL, Redis), Services, ConfigMap (nginx), Secret (DB credentials), PVC (MySQL), Ingress
- [ ] Immutable image tags (commit SHA) pushed by CI
- [ ] CI step that updates the image tag in `/k8s` and commits it back
- [ ] ArgoCD `Application` pointed at `/k8s` with automated sync, prune and self-heal

---

## ♾️ CI/CD Pipeline Overview

The project uses GitHub Actions workflows defined in `.github/workflows/` to enforce software quality gates. The six workflows run in parallel, and the image push waits for all of them:

```
[ Push to main ] 
   │
   ├── code-quality.yml       Laravel Pint            (matrix: PHP 8.2 / 8.3 / 8.4)
   ├── secret-scanning.yml    Gitleaks                (full git history)
   ├── dependency-checks.yml  Composer Audit          (matrix: PHP 8.2 / 8.3 / 8.4)
   ├── code-tests.yml         PHPUnit                 (matrix: PHP 8.2 / 8.3 / 8.4)
   ├── docker-scans.yml       Hadolint + Trivy        (matrix: nginx / php-fpm)
   │
   └── docker-push.yml        Build and push to Docker Hub (needs all of the above)
```

More detail in [CI_PIPELINE.md](https://github.com/vishch24/procodeblogs/blob/main/CI_PIPELINE.md).

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
APP_KEY=base64:<run: openssl rand -base64 32>
APP_URL=http://localhost

# Docker Database Configuration
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=procodeblogs
DB_USERNAME=procode_user   # must NOT be "root", the MySQL image rejects MYSQL_USER=root
DB_PASSWORD=<strong-password>

REDIS_HOST=redis

# Google OAuth Credentials
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_REDIRECT_URI=http://localhost/auth/google/callback
```

### 2. Build & Launch Containers

```bash
docker compose up -d --build
docker compose ps        # wait until php-fpm, mysql and redis show "healthy"
```

The app is served on `http://localhost` (change the host port with `NGINX_PORT`).

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

---

## Author

**Vishakha Chavan** · [GitHub](https://github.com/vishch24) · [LinkedIn](https://www.linkedin.com/in/vishakha-chavan24/)