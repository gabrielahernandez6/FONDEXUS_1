# FONDEXUS_1 Project Context

## Project Overview
This is a web application built using the **Laravel 12** framework on the backend and **React 19** with **Inertia.js 2.0** on the frontend. It utilizes **TypeScript** for the frontend codebase and **TailwindCSS 4** for styling.

### Key Technologies
*   **Backend:** Laravel 12 (PHP 8.2+)
*   **Frontend:** React 19, Inertia.js 2.0, TypeScript
*   **Styling:** TailwindCSS 4
*   **Build Tools:** Vite 7, Bun (Package Manager)
*   **Database:** SQLite (default configuration), PostgreSQL (likely supported based on project structure)
*   **Testing:** Pest (PHP)

## Directory Structure
*   **`app/`**: Core Laravel application logic (Models, Controllers, Middleware).
*   **`resources/js/`**: React frontend application.
    *   **`pages/`**: Inertia page components (correspond to routes).
    *   **`components/`**: Reusable React components (UI, Layouts).
    *   **`hooks/`**: Custom React hooks.
    *   **`layouts/`**: Application layouts.
    *   **`types/`**: TypeScript type definitions.
*   **`routes/`**: Route definitions (`web.php`, `settings.php`, `console.php`).
*   **`database/`**: Database migrations, factories, and seeders.
*   **`tests/`**: Feature and Unit tests using Pest.
*   **`public/`**: Publicly accessible assets.

## Development Setup

### Prerequisites
*   PHP 8.2+
*   Composer
*   Bun (JavaScript runtime & package manager)
*   Node.js (implicitly required by some tools)

### Installation
1.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
2.  **Install JavaScript dependencies:**
    ```bash
    bun install
    ```
3.  **Environment Setup:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    touch database/database.sqlite # If using SQLite
    php artisan migrate
    ```

### Running the Application
The project includes a helper script in `composer.json` to run all necessary processes (Laravel server, Queue worker, Vite dev server) concurrently:

```bash
composer run dev
```

Alternatively, you can run them individually:
*   **Backend:** `php artisan serve`
*   **Frontend (Vite):** `bun run dev`
*   **Queue:** `php artisan queue:listen`

### Building for Production
To compile frontend assets:
```bash
bun run build
```

## Testing
The project uses **Pest** for PHP testing.

*   **Run all tests:**
    ```bash
    php artisan test
    ```
*   **Run specific test file:**
    ```bash
    php artisan test tests/Feature/ExampleTest.php
    ```

## Coding Conventions
*   **Backend:** Follow standard PSR-12 and Laravel naming conventions.
*   **Frontend:**
    *   Use functional components with Hooks.
    *   Use TypeScript for type safety.
    *   Follow the directory structure in `resources/js` (Components, Pages, Layouts).
    *   Inertia `Link` component should be used for internal navigation.
*   **Styling:** Use Tailwind utility classes.
