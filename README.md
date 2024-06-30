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