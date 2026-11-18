# 💳 Trade Finance Guarantee Management System

An enterprise web application built with **Laravel**, **Tailwind CSS**, and **MySQL** for corporate banking and trade finance workflows. The system streamlines the issuance, validation, bulk ingestion, and lifecycle tracking of bank guarantees and letters of credit.

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

---

## 📌 Key Capabilities

- **📋 Guarantee Lifecycle Management**: Complete CRUD operations for issuing, reviewing, amending, and tracking bank guarantees across their full lifecycle.
- **📁 Bulk File Ingestion Pipeline**: High-throughput file upload controller capable of ingesting batches of corporate guarantee records with automated schema validation.
- **🏗️ Service Layer Architecture**: Decoupled MVC design utilizing `GuaranteeService` to isolate domain business logic from HTTP controller actions.
- **🔒 Enterprise Security & Auth**: Authenticated dashboard access, email verification, CSRF token protection, and parameter-binding SQL injection defense via Eloquent ORM.
- **⚡ Modern Responsive UI**: Built with Laravel Blade components and Tailwind CSS, bundled with Vite for fast HMR and responsive layouts across desktop and mobile devices.

---

## 🏛️ System Architecture

```text
[ Client Browser ]
        │  HTTPS (REST / Blade)
        ▼
[ Laravel Routing & Middleware (Auth, Verified, CSRF) ]
        │
        ├──▶ GuaranteeController ──▶ GuaranteeService ──▶ Eloquent ORM (Guarantee Model)
        │                                                         │
        ├──▶ FileUploadController ──▶ Storage / Parser ───────────┘
        │                                                         ▼
        └──▶ Blade Views (Tailwind CSS + Vite) ◀────────── [ MySQL Database ]
```

---

## 🗄️ Core Data Model

The `guarantees` entity encapsulates all core contractual attributes of trade finance instruments:

| Field | Type | Description |
| :--- | :--- | :--- |
| `id` | `BIGINT (PK)` | Auto-increment primary key |
| `corporate_reference_number` | `VARCHAR` | Unique corporate transaction identifier |
| `guarantee_type` | `VARCHAR` | Instrument type (Performance, Bid, Advance Payment, Financial) |
| `nominal_amount` | `DECIMAL` | Contractual guarantee sum |
| `nominal_amount_currency` | `VARCHAR(3)` | ISO 4217 currency code (USD, EUR, CAD, etc.) |
| `expiry_date` | `DATETIME` | Contractual maturity / expiry timestamp |
| `applicant_name` | `VARCHAR` | Corporate applicant issuing entity |
| `applicant_address` | `TEXT` | Physical / legal address of applicant |
| `beneficiary_name` | `VARCHAR` | Receiving entity / beneficiary |
| `beneficiary_address` | `TEXT` | Legal address of beneficiary |
| `created_at` / `updated_at` | `TIMESTAMP` | Audit trail timestamps |

---

## 🚀 Getting Started

### Prerequisites
- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x & **npm**
- **MySQL** / MariaDB

### Local Installation

```bash
# 1. Clone repository
git clone https://github.com/vaibhavmistryyy/TradeFinanceGuaranteeSystem.git
cd TradeFinanceGuaranteeSystem

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install

# 4. Environment configuration
cp .env.example .env
php artisan key:generate

# 5. Configure MySQL database in .env and run migrations
php artisan migrate

# 6. Build assets and launch dev server
npm run build
php artisan serve
```

---

## 👤 Author

**Vaibhav Mistry**  
- GitHub: [@vaibhavmistryyy](https://github.com/vaibhavmistryyy)
