# Инструкция по разворачиванию проекта на Laravel:

- laravel new
- composer require laravel/sail --dev
- php artisan sail:install (pgsql, redis, mailpit)
- корректировка конфига compose.yaml
- sail build --no-cache
- php artisan sail:publish
- sail up -d
