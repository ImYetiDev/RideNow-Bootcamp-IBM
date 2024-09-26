@section('title', 'Mapa')
@include('header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        @include('sidebar')



        @include('navbar')


        @include('cards')

        <div class="container-fluid position-relative d-block p-4 mb-4">
            <h1>Mapa</h1>

            <!-- Mapa de Google -->
            <div id="map" style="height: 320px; width: 100%;"></div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@2.0.0/Control.FullScreen.css" />
        <script src="https://unpkg.com/leaflet.fullscreen@2.0.0/Control.FullScreen.js"></script>

        <script>
            // Inicializar el mapa
            var map = L.map('map', {
                fullscreenControl: true, // Activar el control de pantalla completa
                fullscreenControlOptions: { // Opciones para el control de pantalla completa
                    position: 'topright' // Posición del botón (puede ser 'topleft', 'topright', 'bottomleft', 'bottomright')
                }
            }).setView([3.4516, -76.5320], 13); // Coordenadas de Cali

            // Añadir el tile layer de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Definir íconos personalizados
            var bikeIcon1 = L.icon({
                iconUrl: '/icons/bicycle.svg', // Coloca aquí la URL del ícono de bicicleta
                iconSize: [32, 32], // Tamaño del icono
                iconAnchor: [16, 32], // Punto de anclaje del ícono
                popupAnchor: [0, -32] // Punto donde se mostrará el popup
            });


            var stationIcon = L.icon({
                iconUrl: '/icons/house.svg', // Coloca aquí la URL del ícono de estación (hotel)
                iconSize: [32, 32], // Tamaño del icono
                iconAnchor: [16, 32], // Punto de anclaje del ícono
                popupAnchor: [0, -32] // Punto donde se mostrará el popup
            });

            // Función para agregar marcadores al mapa
            function addMarkersToMap(locations, iconType) {
                // Limpiar todos los marcadores anteriores
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                // Agregar cada ubicación como un marcador en el mapa
                locations.forEach(function(location) {
                    var marker = L.marker([location.latitude, location.longitude], {
                        icon: iconType
                    }).addTo(map);
                    var popupContent = iconType === bikeIcon ? "Bicicleta ID: " + location.id : "Nombre estación: " + location.nombre_estacion;
                    marker.bindPopup(popupContent); // Mostrar el ID de la bicicleta o nombre de la estación
                });
            }

            function addMarkersStatioToMap(locations, iconType) {
                // Limpiar todos los marcadores anteriores
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                // Agregar cada ubicación como un marcador en el mapa
                locations.forEach(function(location) {
                    var marker = L.marker([location.latitude, location.longitude], {
                        icon: iconType
                    }).addTo(map);
                    var popupContent = iconType === bikeIcon ? "Bicicleta ID: " + location.id : "Nombre estación: " + location.nombre_estacion;
                    marker.bindPopup(popupContent); // Mostrar el ID de la bicicleta o nombre de la estación
                });
            }

            // Función para obtener ubicaciones de las bicicletas desde la base de datos
            function fetchBikeLocations() {
                fetch('/bicicletas') // Endpoint en tu servidor que devuelva las ubicaciones de las bicicletas en JSON
                    .then(response => response.json())
                    .then(data => {
                        // Llamar a la función para agregar marcadores de bicicletas
                        addMarkersToMap(data, bikeIcon);
                    })
                    .catch(error => console.error('Error al obtener las ubicaciones de bicicletas:', error));
            }

            // Función para obtener ubicaciones de las estaciones desde la base de datos
            function fetchStationLocations() {
                fetch('/estaciones') // Endpoint en tu servidor que devuelva las ubicaciones de las estaciones en JSON
                    .then(response => response.json())
                    .then(data => {
                        // Llamar a la función para agregar marcadores de estaciones
                        addMarkersToMap(data, stationIcon);
                    })
                    .catch(error => console.error('Error al obtener las ubicaciones de estaciones:', error));
            }

            // Llamar a la función para cargar las ubicaciones de las bicicletas al cargar la página
            fetchBikeLocations();
            fetchStationLocations();
            // Si quieres actualizar las ubicaciones en tiempo real, puedes hacer una llamada repetida con un intervalo
            setInterval(fetchBikeLocations, 30000); // Actualizar cada 30 segundos (puedes ajustar el intervalo según sea necesario)
            setInterval(fetchStationLocations, 30000); // Actualizar las estaciones cada 30 segundos
        </script>


        </head>

        <body>
            <!-- <h1>Mapa 2</h1>
            <div id="map" style="height: 600px;"></div> -->

        </body>

        </html>
        <script>
            function cambiarFondo(selected) {
                var selected = document.getElementById(selected);

                // Cambiar el fondo del elemento
                selected.classList.remove('bg-secondary');
                selected.classList.add('bg-success');
            }

            function cambiarIcono(icon) {
                var icon = document.getElementById(icon);

                // Cambiar el icono de color
                icon.classList.remove('text-success');
                icon.classList.add('text-secondary');
            }

            function cambiarTexto(texto) {
                // Obtener el texto y cambiar su color
                var texto = document.getElementById(texto);
                texto.classList.add('text-dark');
            }

            cambiarFondo('evento');
            cambiarIcono('eventoIcon');
            cambiarTexto('eventoText');
        </script>




        <footer class="footer fixed-bottom">
            @include('footer')
        </footer>

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="z-index: 1050;"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>