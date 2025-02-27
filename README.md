Wardrobe Management Backend
This is the backend for the Wardrobe Management application, built with Laravel. It provides API endpoints for user authentication, wardrobe management, and more, using Laravel Sanctum for secure authentication. Follow the steps below to set up and run the project locally after downloading it from GitHub.
Prerequisites
Before you begin, ensure you have the following installed on your system:
PHP: Version 8.2 or higher

Composer: Dependency manager for PHP (latest version recommended)

MySQL or another database supported by Laravel (e.g., PostgreSQL, SQLite)

Node.js and npm: Optional, only if frontend assets need to be compiled

Git: To clone the repository (if not already downloaded)

A local server environment (e.g., Laravel Valet, XAMPP, or built-in PHP server)

Setup Instructions
1. Clone or Download the Repository
If you haven’t already downloaded the project:
bash

git clone https://github.com/your-username/wardrobe-management-backend.git
cd wardrobe-management-backend

Replace your-username with the actual GitHub username or repository path.
2. Install PHP Dependencies
Install the required PHP packages using Composer:
bash

composer install

This will download all dependencies listed in composer.json, including Laravel, Sanctum, and others.
3. Set Up Environment File
Copy the example environment file and configure it:
bash

cp .env.example .env

Edit .env with your local settings:
Database: Update the DB_* variables:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wardrobe_management
DB_USERNAME=your_username
DB_PASSWORD=your_password

App URL: Set the base URL for your local backend:

APP_URL=http://localhost:8000

Sanctum Stateful Domains: If testing with a frontend, add its URL:

SANCTUM_STATEFUL_DOMAINS=http://localhost:3000

Replace http://localhost:3000 with your frontend’s local URL if different.

4. Generate Application Key
Generate a unique application key for Laravel:
bash

php artisan key:generate

This updates the APP_KEY in your .env file.
5. Set Up the Database
Create a database in your MySQL (or chosen DB) client:
sql

CREATE DATABASE wardrobe_management;

Run migrations to set up the database tables:
bash

php artisan migrate

If there’s seed data (e.g., for testing):
bash

php artisan db:seed

6. Install Frontend Dependencies (Optional)
If the backend serves any frontend assets (e.g., Laravel Breeze or custom JS/CSS):
bash

npm install
npm run dev

This compiles assets using Vite or Laravel Mix, depending on the project setup.
7. Run the Application
Start the Laravel development server:
bash

php artisan serve

The backend should now be running at http://localhost:8000. Test it by visiting this URL in your browser or using an API client (e.g., Postman).

