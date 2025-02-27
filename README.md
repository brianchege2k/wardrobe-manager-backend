# Wardrobe Management Backend

This is the backend for the Wardrobe Management application, built with Laravel. It provides API endpoints for user authentication, wardrobe management, and more, using Laravel Sanctum for secure authentication. Follow the steps below to set up and run the project locally after downloading it from GitHub.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- **PHP**: Version 8.2 or higher  
- **Composer**: Dependency manager for PHP (latest version recommended)  
- **MySQL** or another database supported by Laravel (e.g., PostgreSQL, SQLite)  
- **Node.js and npm**: Optional, only if frontend assets need to be compiled  
- **Git**: To clone the repository (if not already downloaded)  
- **A local server environment** (e.g., Laravel Valet, XAMPP, or built-in PHP server)  

## Setup Instructions

### 1. Clone or Download the Repository

If you haven’t already downloaded the project:

```bash
git clone https://github.com/brianchege2k/wardrobe-management-backend.git
cd wardrobe-management-backend
```
### 2. Install PHP Dependencies
Installl the Dependencies
```bash
composer install
```
### 3. Set Up Environment File
Copy the example environment file and configure it:

```bash
cp .env.example .env

```
Edit .env with your local settings:


Database: Update the DB_* variables:
```bash

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wardrobe_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

App URL: Set the base URL for your local backend:
```bash
APP_URL=http://localhost:8000
```

Sanctum Stateful Domains: If testing with a frontend, add its URL:

```bash
SANCTUM_STATEFUL_DOMAINS=http://localhost:3000

```
### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Set Up the Database
```bash
CREATE DATABASE wardrobe_management;

php artisan migrate



```

### 6. Install Frontend Dependencies (Optional)
```bash
npm install
npm run dev

```

### 7. Run the Application
```bash
php artisan serve

