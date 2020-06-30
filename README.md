## Getting Started
```bash
git clone https://github.com/mushonnip/worldanimelist.git
cd worldanimelist
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Info
Saya pake PostgreSQL, kalo mau nyoba pake mysql ganti
```'default' => env('DB_CONNECTION', 'pgsql'),``` jadi ```'default' => env('DB_CONNECTION', 'mysql'),``` di ```config/database.php```
