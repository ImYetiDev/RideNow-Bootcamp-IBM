@section('title', 'Eventos')
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
            <div id="map" style="height: 450px; width: 100%;"></div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
        <script>
            // Inicializar el mapa
            var map = L.map('map').setView([3.4516, -76.5320], 13); // Coordenadas de Cali

            // Añadir el tile layer de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Array de ubicaciones de bicicletas (esto es un ejemplo, podrías obtenerlas en tiempo real)
            var bikeLocations = [{
                    lat: 3.4372,
                    lng: -76.5225,
                    info: 'Bicicleta 1'
                },
                {
                    lat: 3.4613,
                    lng: -76.5453,
                    info: 'Bicicleta 2'
                },
                {
                    lat: 3.4501,
                    lng: -76.5321,
                    info: 'Bicicleta 3'
                }
            ];

            // Función para agregar marcadores al mapa
            bikeLocations.forEach(function(location) {
                var marker = L.marker([location.lat, location.lng]).addTo(map);
                marker.bindPopup(location.info); // Información cuando se haga clic en el marcador
            });

            // Función para actualizar las ubicaciones de las bicicletas en tiempo real (simulado)
            function updateBikeLocations(newLocations) {
                // Aquí puedes actualizar los marcadores, eliminar los antiguos y agregar nuevos
            }

            // Si tienes un servicio que proporciona las ubicaciones en tiempo real, podrías usar fetch() o WebSockets para actualizar
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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