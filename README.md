# apitask
 API de Tareas realizada en Laravel 

Instalación
# Clonar el repositorio
git clone https://github.com/IsaacRoman95/apitask.git

# Instalar dependencias
composer install

# Configurar el archivo de entorno
cp .env.example .env
php artisan key:generate

# Crear la base de datos
CREATE DATABASE dbtask
agregar el nombre de la base de datos creada (dbtask) en el archivo .env

# Ejecutar la aplicación 
php artisan serve

Ahora si puede ejecutar la aplicación frontend para utilizar esta API 
