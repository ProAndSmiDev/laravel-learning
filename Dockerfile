# Используем официальный образ PHP с PHP 8.4 и FPM
FROM php:8.4-fpm

# Обновляем пакеты и устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-install -j$(nproc) pdo_pgsql pgsql

# Установка Composer (если нужен)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем проект в контейнер
WORKDIR /var/www/html
COPY . .

# Настройки прав доступа (по необходимости)
# RUN chown -R www-data:www-data /var/www/html

# Команда по умолчанию
CMD ["php-fpm"]
