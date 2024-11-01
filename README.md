Este proyeco es un programa realizado en la semana de SENASOFT en el evento de Desarrollo Libre planteado por IBM

Es una aplicacion web en la que se puede realizar pedidos para alquilar bicicletas y tener su panel administrativo

Comandos necesarios para iniciar el programa

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --path=/database/migrations/2024_09_24_210906_create_regionales_table.php

php artisan migrate --path=/database/migrations/2024_09_24_155948_create_estaciones_table.php

php artisan migrate

php artisan serve

Para que el programa tenga todas sus funciones se debe agregar algunos elementos a la base de datos como bicicletas, estaciones y regiones

Working on it para que los administradores las creen desde la aplicacion
