# Laravel 10 + Craftable Starter Kit

This is a starter kit for Laravel 10 integrated with Craftable, a powerful admin panel generator for Laravel.

## Installation

1. Clone this repository to your local environment: git clone git@github.com:hauzenberge/craftable_laravel_started_kit.git


2. Navigate to the project directory: cd craftable_laravel_started_kit

3. Install PHP dependencies using Composer: composer install
 
4. Copy the `.env.example` file to `.env` and configure your database settings: cp .env.example .env

5. Generate an application key: php artisan key:generate


6. Run the database migrations: php artisan migrate:refresh --seed


7. Install JavaScript dependencies and build the frontend: npm install && npm run craftable-prod


For more information on how to use Craftable, please refer to the [Craftable documentation](https://getcraftable.com/docs/8.0/overview).
