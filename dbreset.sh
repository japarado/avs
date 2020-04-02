mysql --user=root --execute="DROP DATABASE IF EXISTS avs"
mysql --user=root --execute="CREATE DATABASE IF NOT EXISTS avs;"
php artisan migrate:refresh --seed;
