## Tech stacks

<a href="https://laravel.com/"><img src="https://laravel.com/img/logotype.min.svg" alt="next" title="Laravel" /></a>
<a href="https://laravel-livewire.com/"><img src="https://logowik.com/content/uploads/images/laravel-livewire4180.logowik.com.webp" alt="livewire" title="Livewire" /></a>
<a href="https://alpinejs.dev/"><img src="https://alpinejs.dev/alpine_long.svg" alt="alpineJS" title="AlpineJS" /></a>
<a href="https://tailwindcss.com/"><img src="https://img.shields.io/badge/Tailwindcss-3.3.0-blue.svg" alt="tailwind" title="Tailwind" /></a>
<a href="https://www.mysql.com/"><img src="https://www.svgrepo.com/show/303251/mysql-logo.svg" alt="mysql" title="MySql" /></a>
<a href="https://sass-lang.com/"><img src="https://sass-lang.com/assets/img/logos/logo.svg" alt="sass" title="Sass" /></a>

## System requirements

- Nginx / Apache
- Node
- MySQL

## Setup and Configuration

1. Install dependencies:

```bash
npm install
composer install
```

2. Connect database:

Connect to database in .env


3. Migrate and seed database

```bash
php artisan migrate --seed
```

## Usage

To start the application locally, use the following command:

```sh
npm run dev
php artisan serve
```

The application will be accessible at:

- Web: [http://localhost:8000](http://localhost:8000)

## License

This project is licensed under the [MIT License](LICENSE).