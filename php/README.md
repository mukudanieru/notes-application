# PHP Notes App

The PHP implementation of the [Notes App](../README.md).

This version is intentionally built with **vanilla PHP** and **MySQL**, without a full-stack PHP framework. The goal is to understand how the pieces work underneath the abstractions provided by frameworks.

## Stack

- PHP
- MySQL
- Tailwind CSS

## Project Structure

`public/` contains files exposed to the web server.

`src/` contains the PHP application code:

- `Controllers/` — handles requests and application flow
- `Core/` — shared infrastructure such as the database connection
- `Models/` — database-related logic
- `Views/` — server-rendered PHP templates

`resources/` contains frontend source files. Tailwind processes the CSS here and generates the compiled stylesheet under `public/`.

## Setup

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create your environment file:

```bash
cp .env.example .env
```

Configure the database connection in `.env`.

Make sure the MySQL database and required tables have been created using the shared schema from the root project README.

## Development

Start the PHP development server:

```bash
php -S localhost:8000 -t public
```

In a separate terminal, start Tailwind in watch mode:

```bash
npm run dev:css
```

Then open:

```text
http://localhost:8000
```

PHP serves the application, while Tailwind CLI watches the source files and rebuilds the generated CSS when changes are made.

## Build CSS

To generate the CSS once without watch mode:

```bash
npm run build:css
```

The generated stylesheet is placed in:

```text
public/css/app.css
```

The generated CSS is not committed to the repository.

## Status

**In Progress**

The implementation is being built incrementally while learning vanilla PHP, including routing, database access, authentication, authorization, validation, and server-side rendering.
