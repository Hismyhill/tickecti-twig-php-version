# Ticketi — Twig/PHP Implementation

A ticket management system built with PHP, Twig, and Tailwind CSS.

## Features

- User authentication
- Ticket CRUD (Create, Read, Update, Delete)
- Responsive, accessible UI
- Protected routes
- Tailwind CSS styling

## Tech Stack

- PHP 8+
- Twig templating engine
- Tailwind CSS

## Getting Started

### Prerequisites

- PHP 8+
- Composer
- Node.js & npm

### Installation

```bash
git clone <repository-url>
cd twig-ticket
composer install
npm install
```

Build Tailwind CSS:

```bash
npm run build:css
```

Start the PHP development server:

```bash
php -S localhost:8000 -t src
```

Visit [http://localhost:8000](http://localhost:8000)

## Project Structure

```
twig-ticket/
  src/
    index.php         # Main entry point
    templates/        # Twig templates
    styles/           # Tailwind CSS
  vendor/             # Composer dependencies
  package.json        # Node.js dependencies
  composer.json       # PHP dependencies
```

## Environment Variables

Configure as needed in your PHP or .env files.

## License

MIT
