#!/usr/bin/env bash

# Esperar a que MySQL (si usás base de datos) esté listo - opcional
# sleep 10

# Correr migraciones (opcional si no usás DB)
# php artisan migrate --force

# Arrancar el servidor embebido de Laravel
php artisan serve --host=0.0.0.0 --port=10000