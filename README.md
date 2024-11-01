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


Consultas a la base de datos para que no este vacia

INSERT INTO regionales (nombre) VALUES 
('Antioquia'),
('Atlántico'),
('Bolívar'),
('Boyacá'),
('Caldas'),
('Caquetá'),
('Casanare'),
('Cauca'),
('Cesar'),
('Chocó'),
('Córdoba'),
('Cundinamarca'),
('Distrito Capital (Bogotá)'),
('Guaviare'),
('Huila'),
('La Guajira'),
('Magdalena'),
('Meta'),
('Nariño'),
('Norte de Santander'),
('Putumayo'),
('Quindío'),
('Risaralda'),
('Santander'),
('Sucre'),
('Valle');

INSERT INTO estaciones (nombre_estacion, direccion, latitud, longitud, capacidad)
VALUES
('Estación San Fernando', 'Carrera 34 # 3-57', 3.4266, -76.5351, 15),
('Estación El Peñón', 'Avenida 3N # 7N-23', 3.4502, -76.5355, 20),
('Estación Ciudad Jardín', 'Calle 18 # 122-75', 3.3675, -76.5361, 12),
('Estación Granada', 'Avenida 8 Norte # 10-12', 3.4528, -76.5331, 18),
('Estación Santa Mónica', 'Calle 5B Norte # 23N-52', 3.4590, -76.5310, 10),
('Estación Tequendama', 'Calle 5 # 39-70', 3.4196, -76.5353, 25),
('Estación Versalles', 'Carrera 24B # 6A-45', 3.4555, -76.5292, 22),
('Estación La Flora', 'Avenida 4 Norte # 44N-23', 3.4781, -76.5289, 18),
('Estación Pance', 'Carrera 125 # 18-44', 3.3536, -76.5391, 15),
('Estación San Antonio', 'Calle 2 Oeste # 4-34', 3.4447, -76.5459, 20),
('Estación Limonar', 'Carrera 66 # 10-15', 3.3993, -76.5302, 17),
('Estación Caney', 'Calle 25 # 86-45', 3.3734, -76.5205, 15),
('Estación Valle del Lili', 'Carrera 98 # 25-55', 3.3624, -76.5298, 18),
('Estación Meléndez', 'Carrera 94 # 4C-70', 3.3678, -76.5382, 12),
('Estación Aguacatal', 'Calle 8 Oeste # 32-11', 3.4596, -76.5664, 10);


INSERT INTO bicicletas (marca, color, estado, precio, region_id, estacion_id, longitud, latitud)
VALUES 
('Trek', 'Rojo', 'Libre', 15000, 1, 1, -75.5636, 6.2518),
('Specialized', 'Azul', 'Alquilada', 12000, 1, 1, -75.5636, 6.2518),
('Cannondale', 'Negro', 'Mantenimiento', 14000, 1, 1, -75.5636, 6.2518),
('Giant', 'Verde', 'Libre', 13000, 2, 2, -74.8069, 10.9685),
('Scott', 'Rojo', 'Libre', 12500, 2, 2, -74.8069, 10.9685),
('Orbea', 'Negro', 'Mantenimiento', 15000, 2, 2, -74.8069, 10.9685),
('Merida', 'Azul', 'Libre', 11000, 3, 3, -75.5144, 10.3910),
('Bianchi', 'Rojo', 'Alquilada', 13500, 3, 3, -75.5144, 10.3910),
('Polygon', 'Blanco', 'Mantenimiento', 14500, 3, 3, -75.5144, 10.3910),
('GT', 'Verde', 'Libre', 12000, 4, 4, -73.3649, 5.5401),
('Canyon', 'Negro', 'Alquilada', 11000, 4, 4, -73.3649, 5.5401),
('Fuji', 'Rojo', 'Mantenimiento', 12500, 4, 4, -73.3649, 5.5401),
('Santa Cruz', 'Blanco', 'Libre', 14000, 5, 5, -75.4846, 5.0677),
('Cube', 'Negro', 'Alquilada', 13000, 5, 5, -75.4846, 5.0677),
('Raleigh', 'Verde', 'Mantenimiento', 15000, 5, 5, -75.4846, 5.0677),
('Norco', 'Amarillo', 'Libre', 12000, 6, 6, -75.6167, 1.6144),
('Marin', 'Rojo', 'Alquilada', 14000, 6, 6, -75.6167, 1.6144),
('Yeti', 'Blanco', 'Mantenimiento', 12500, 6, 6, -75.6167, 1.6144),
('Lapierre', 'Verde', 'Libre', 15000, 7, 7, -71.7289, 5.3378),
('Vitus', 'Negro', 'Alquilada', 13500, 7, 7, -71.7289, 5.3378),
('Rockrider', 'Rojo', 'Mantenimiento', 13000, 7, 7, -71.7289, 5.3378),
('Scott', 'Blanco', 'Libre', 14000, 8, 8, -76.6147, 2.4448),
('BMC', 'Verde', 'Alquilada', 14500, 8, 8, -76.6147, 2.4448),
('Kona', 'Negro', 'Mantenimiento', 12500, 8, 8, -76.6147, 2.4448),
('Trek', 'Amarillo', 'Libre', 13000, 9, 9, -73.2532, 10.4742),
('Specialized', 'Rojo', 'Alquilada', 12500, 9, 9, -73.2532, 10.4742),
('Cannondale', 'Blanco', 'Mantenimiento', 13500, 9, 9, -73.2532, 10.4742),
('Giant', 'Verde', 'Libre', 14500, 10, 10, -76.6564, 5.6947),
('Scott', 'Negro', 'Alquilada', 11000, 10, 10, -76.6564, 5.6947),
('Orbea', 'Rojo', 'Mantenimiento', 12000, 10, 10, -76.6564, 5.6947),
('Merida', 'Blanco', 'Libre', 15000, 11, 11, -75.8814, 8.7479),
('Bianchi', 'Verde', 'Alquilada', 13000, 11, 11, -75.8814, 8.7479),
('Polygon', 'Negro', 'Mantenimiento', 14000, 11, 11, -75.8814, 8.7479);
