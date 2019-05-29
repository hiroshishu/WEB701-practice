# WEB701-practice

This is WEB701 practice site using Laravel framwork. Redis and nodejs are required.

-- Generate a CRSF key
php artisan key:generate

-- Migrate database
php artisan migrate

-- Generate mock data
php artisan db:seed

-- Make data to look more real
delete items from items join users on items.user_id = users.id where users.is_grower = 0;

php artisan migrate:refresh      Reset and re-run all migrations
php artisan migrate:reset        Rollback all database migrations