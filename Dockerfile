FROM php:8.2-fpm

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git curl libpq-dev unzip libzip-dev zip libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www

# Copiar archivos de la app
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Generar clave de app solo si `.env` ya existe (evita errores en entorno nuevo)
RUN if [ -f .env ]; then php artisan key:generate; fi

# Otorgar permisos correctos para Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Importante: usa CMD (NO RUN) para ejecutar migraciones en tiempo de ejecución,
# no durante el build, porque el contenedor aún no tiene conexión a DB en ese punto
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
