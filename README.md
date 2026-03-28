# 📝 ProCodeBlogs

A full-stack blogging platform built with **Laravel 11**, featuring rich-text editing, Google OAuth, email verification, author-managed posts, and a threaded comment system — all wrapped in a responsive Bootstrap UI.

[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=flat&logo=vite&logoColor=white)](https://vitejs.dev)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)](https://opensource.org/licenses/MIT)

---

## ✨ Features

- **Rich Text Editor** — Trix-powered editor (via `tonysm/rich-text-laravel`) supporting formatted blog posts with images, links, and headings. Even code!
- **Google OAuth** — One-click sign-in with Google via Laravel Socialite
- **User Authentication** — Full auth scaffolding with Laravel Breeze (register, login, password reset)
- **Email Verification** — Users must verify their email address before accessing the platform after registration
- **Author Registration** — Dedicated author role with the ability to publish and manage their own blog posts
- **Threaded Comments** — Both authors and readers can post comments on blogs, with nested reply-to support
- **Blog Management** — Create, edit, and delete blog posts with slug-based routing
- **Responsive UI** — Mobile-first design built with Bootstrap 5.3.3 and Alpine.js
- **Asset Bundling** — Vite for fast frontend builds with HMR in development
- **Database Sessions & Cache** — Session and cache handled via database driver for reliability

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Backend Framework | Laravel 11 (PHP 8.2+) |
| Frontend Styling | Bootstrap 5.3.3, Alpine.js 3.x |
| Templating | Blade |
| Rich Text | Trix Editor + `tonysm/rich-text-laravel` |
| Auth / OAuth | Laravel Breeze + Laravel Socialite (Google) |
| Database | MySQL |
| Asset Pipeline | Vite 6 + Laravel Vite Plugin |
| Testing | PHPUnit 11 |
| Dev Tooling | Laravel Sail, Pint, Pail |

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+ & npm
- MySQL

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/vishch24/procodeblogs.git
cd procodeblogs

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Set up environment
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env
DB_DATABASE=procodeblogs
DB_USERNAME=root
DB_PASSWORD=your_password

# 6. Run migrations
php artisan migrate

# 7. Create storage symlink
php artisan storage:link

# 8. Start the development server
composer run dev
```

The application will be available at `http://localhost:8000`.

### Environment Variables

Key variables to configure in `.env`:

```env
# App
APP_NAME=ProCodeBlogs
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_DATABASE=procodeblogs

# Mail (required for email verification)
MAIL_MAILER=smtp
MAIL_HOST=your_mail_host
MAIL_PORT=587
MAIL_USERNAME=your_mail_username
MAIL_PASSWORD=your_mail_password
MAIL_FROM_ADDRESS=hello@procodeblogs.com

# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

---

## 📁 Project Structure

```
procodeblogs/
├── app/
│   ├── Http/Controllers/     # Request handling & business logic
│   ├── Models/               # Eloquent models
│   └── Providers/            # Service providers
├── database/
│   ├── migrations/           # Schema definitions
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Styles
│   └── js/                   # Alpine.js components
├── routes/
│   └── web.php               # Application routes
└── tests/                    # PHPUnit test suite
```

---

## 🧪 Running Tests

```bash
php artisan test
```

---

## 🔍 Key Implementation Highlights

- **MVC Architecture** — Clean separation of concerns with dedicated controllers, models, and Blade views following Laravel conventions
- **Eloquent ORM** — Relationships between users, posts, comments, and replies managed with Eloquent
- **Role-Based Access** — Separate author and reader roles, with authors having write access to the post management dashboard
- **Email Verification Flow** — Laravel's built-in `MustVerifyEmail` contract enforced before granting platform access
- **Google OAuth Flow** — Socialite integration enables seamless one-click Google login without password overhead
- **Threaded Comments** — Self-referential comment model supporting reply-to on both author and reader comments
- **Rich Text Storage** — `tonysm/rich-text-laravel` stores Trix content safely, handling attachments and embedded media
- **Queue-Ready** — Queue connection configured via database driver, ready to offload background jobs like verification emails

---

## 📄 License

This project is open-sourced under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🙋 Author

**Vishakha Chavan** — [github.com/vishch24](https://github.com/vishch24)

> Built as a personal project to deepen understanding of the Laravel 11 ecosystem — from Breeze auth scaffolding, email verification, and Google OAuth via Socialite, to Trix-powered rich text, role-based access, and a threaded comment system.
