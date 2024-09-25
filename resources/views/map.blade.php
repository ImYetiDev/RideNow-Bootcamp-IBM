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

        <div class="container-fluid position-relative d-block p-4">
            <h1>Mapa</h1>

            <!-- Mapa de Google -->
            <div id="map" class="pb-5 mb-4" style="height: 450px; width: 100%;"></div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
        <script>
            //funciones mapa
            var map;
            var markers = [];

            // Inicializar el mapa centrado en Cali
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 3.4516,
                        lng: -76.531985
                    }, // Cali
                    zoom: 13
                });

                // Cargar las ubicaciones de las estaciones
                loadBikeLocations();
            }

            // Función para cargar las estaciones y agregar marcadores
            function loadBikeLocations() {
                fetch('/api/estaciones') // Cambia la URL según tu ruta de API
                    .then(response => response.json())
                    .then(estaciones => {
                        estaciones.forEach(estacion => {
                            addMarker(estacion);
                        });
                    })
                    .catch(error => {
                        console.error('Error al cargar las estaciones:', error);
                    });
            }

            // Función para agregar un marcador en el mapa para una estación
            function addMarker(estacion) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(estacion.latitude),
                        lng: parseFloat(estacion.longitude)
                    },
                    map: map,
                    title: estacion.nombre_estacion
                });

                var infoWindow = new google.maps.InfoWindow({
                    content: `<h3>${estacion.nombre_estacion}</h3><p>${estacion.direccion}</p>`
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });

                markers.push(marker);
            }
        </script>
        </head>

        <body>
            <h1>Mapa de Estaciones</h1>
            <div id="map" style="height: 500px; width: 100%;"></div>
        </body>

        </html>

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