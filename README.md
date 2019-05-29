# WEB701-practice

This is WEB701 practice site using Laravel framwork. Redis and nodejs are required.

### Generate a CRSF key
<code>php artisan key:generate</code>

### Migrate database
<code>php artisan migrate</code> 

### Generate mock data
<code>php artisan db:seed</code> 

### Make data more real
<code>delete items from items join users on items.user_id = users.id where users.is_grower = 0;</code> 

### Reset and re-run all migrations
<code>php artisan migrate:refresh</code>      

### Rollback all database migrations
<code>php artisan migrate:reset </code>       