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

            // Función para agregar marcadores al mapa
            function addMarkersToMap(bikeLocations) {
                // Limpiar todos los marcadores anteriores (si estás actualizando en tiempo real)
                map.eachLayer(function(layer) {
                    if (layer instanceof L.Marker) {
                        map.removeLayer(layer);
                    }
                });

                // Agregar cada ubicación de bicicleta como un marcador en el mapa
                bikeLocations.forEach(function(location) {
                    var marker = L.marker([location.latitude, location.longitude]).addTo(map);
                    marker.bindPopup("Bicicleta ID: " + location.id); // Mostrar el ID de la bicicleta
                });
            }

            // Función para obtener ubicaciones de las bicicletas desde la base de datos
            function fetchBikeLocations() {
                fetch('/bicicletas') // Asegúrate de tener un endpoint en tu servidor que devuelva las ubicaciones de las bicicletas en JSON
                    .then(response => response.json())
                    .then(data => {
                        // Llamar a la función para agregar marcadores usando los datos recibidos
                        addMarkersToMap(data);
                    })
                    .catch(error => console.error('Error al obtener las ubicaciones:', error));
            }

            // Llamar a la función para cargar las ubicaciones de las bicicletas al cargar la página
            fetchBikeLocations();

            // Si quieres actualizar las ubicaciones en tiempo real, puedes hacer una llamada repetida con un intervalo
            setInterval(fetchBikeLocations, 30000); // Actualizar cada 30 segundos (puedes ajustar el intervalo según sea necesario)
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