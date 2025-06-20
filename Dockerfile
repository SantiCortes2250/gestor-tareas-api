FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl libpq-dev unzip libzip-dev zip libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de la app
WORKDIR /var/www

# Copiar archivos
COPY . .

# Instalar dependencias
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Permisos
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Ejecuta migraciones automáticas
RUN php artisan migrate --force

# Puerto
EXPOSE 8000

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
