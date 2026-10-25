# PHP Notes App

The PHP implementation of the [Notes App](../README.md).

This version is intentionally built with **vanilla PHP** and **MySQL**, without a full-stack PHP framework. The goal is to understand how the pieces work underneath the abstractions provided by frameworks.

## Stack

- PHP
- MySQL (via Docker)
- phpMyAdmin (via Docker)
- Tailwind CSS

## Project Structure

`public/` contains files exposed to the web server.

`src/` contains the PHP application code:

- `Controllers/` — handles requests and application flow
- `Core/` — shared infrastructure such as the database connection
- `Models/` — database-related logic
- `Views/` — server-rendered PHP templates

`resources/` contains frontend source files. Tailwind processes the CSS here and generates the compiled stylesheet under `public/`.

`database/schema/` contains the SQL files that define the database tables. They are a reference kept in version control and are applied manually (see [Database](#database)).

`compose.yaml` defines the Docker services (MySQL and phpMyAdmin). PHP itself runs on the host, not in Docker.

## Requirements

- PHP 8.x with the `pdo_mysql` extension
- Composer
- Node.js and npm
- Docker with the Compose plugin

On Fedora, the PHP side can be installed with:

```bash
sudo dnf install php-cli php-mysqlnd php-mbstring php-xml composer
```

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

Configure the database connection in `.env`. The same file is read by both the PHP app and Docker Compose:

```env
DB_HOST=127.0.0.1
DB_NAME=app
DB_USERNAME=app
DB_PASSWORD=secret
DB_ROOT_PASSWORD=rootsecret
```

Use `127.0.0.1` rather than `localhost`. PDO treats `localhost` as a Unix socket connection, which does not reach the database inside the container.

## Database

Start MySQL and phpMyAdmin:

```bash
docker compose up -d
```

phpMyAdmin is available at:

```text
http://localhost:8081
```

Log in with the `DB_USERNAME` and `DB_PASSWORD` values from `.env`.

The database named in `DB_NAME` is created automatically, but it starts empty. Create the tables by running the SQL files from `database/schema/` in phpMyAdmin, either through the **SQL** tab (paste the contents) or the **Import** tab (upload the file). Run them in numbered order, since later tables may depend on earlier ones.

The files in `database/schema/` are the source of truth for the schema. After changing a table in phpMyAdmin, update the matching file so the repository stays in sync.

### Stop the database

```bash
docker compose down
```

This keeps your data. It is stored in the `db_data` Docker volume.

### Reset the database

This deletes all data, including the tables. Run the schema files again afterwards:

```bash
docker compose down -v
docker compose up -d
```

## Development

Make sure the database is running (`docker compose up -d`), then start the PHP development server:

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

## Troubleshooting

- **`could not find driver`** — the `pdo_mysql` PHP extension is missing. Check with `php -m | grep -i pdo`.
- **Connection refused** — the database container is not running (`docker compose ps`), or `DB_HOST` is not `127.0.0.1`.
- **Port 3306 already in use** — another MySQL or MariaDB service is running locally. Stop it, or change the host port in `compose.yaml`.
- **Table doesn't exist** — the tables have not been created yet. Run the files in `database/schema/` through phpMyAdmin.
- **Changed `DB_USERNAME` or `DB_PASSWORD` but login still uses the old ones** — MySQL only reads these on the first start with an empty volume. Reset with `docker compose down -v`.

## Status

**In Progress**

The implementation is being built incrementally while learning vanilla PHP, including routing, database access, authentication, authorization, validation, and server-side rendering.
