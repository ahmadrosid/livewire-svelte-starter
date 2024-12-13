# Livewire Svelte Starter

Livewire scelte starter code for you.

## Environment

This project requires an Anthropic AI API key. Please add your key to the .env file.

```bash
ANTHROPIC_API_KEY=
```

## Features

- **Liveiwire**: Built with [Livewire](https://laravel-livewire.com), enabling dynamic interfaces without leaving the page.
- **Google Auth**: Seamlessly connect your application to Google services for user authentication.
- **Filament**: A powerful admin panel for Laravel applications, providing an intuitive interface for managing your app's data.
- **Laravel Pulse**: A package for monitoring your Laravel application's health and performance.

## Running Locally

First install php dependencies
```bash
composer install
```

Then install npm dependencies
```bash
npm install
```

Build the javascript bundle
```bash
npm run build
```

Run the server
```bash
php artisan serve
```

Open http://localhost:8000

## Create User

Create admin user.

```bash
php artisan make:filament-user
```

## Before production deploy

Optimize the env.

```bash
php artisan optimize
php artisan filament:optimize
