@section('title', 'Eventos')
@include('header')

<body>
    <div class="container-fluid position-relative d-flex p-0">

        @include('sidebar')



        @include('navbar')


        @include('cards')

        <div class="container-fluid position-relative d-block p-4">

            <div class="container">
                <h1>Ubicación de Bicicletas en Tiempo Real</h1>

                <!-- Mapa de Google -->
                <!-- <div id="map" style="height: 500px; width: 100%;"></div> -->
            </div>
        </div>

        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFDijGzbbLbz1cKolz8M0IICTSovLb-A8&callback=initMap" async defer></script>

        <script>
            var map;
            var markers = [];

            function initMap() {
                // Inicializar el mapa centrado en una ubicación (por ejemplo, Cali)
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: 3.4516,
                        lng: -76.531985
                    }, // Coordenadas de Cali
                    zoom: 13
                });

                // Cargar las ubicaciones de las bicicletas en tiempo real
                loadBikeLocations();
            }

            // Función para cargar ubicaciones de bicicletas desde el servidor
            function loadBikeLocations() {
                fetch("{{ route('bicicletas.ubicaciones') }}")
                    .then(response => response.json())
                    .then(data => {
                        clearMarkers(); // Limpiar los marcadores anteriores
                        data.forEach(bike => {
                            addMarker(bike); // Añadir un nuevo marcador por cada bicicleta
                        });
                    });

                // Actualizar las ubicaciones cada 10 segundos
                setTimeout(loadBikeLocations, 10000);
            }

            // Función para añadir un marcador en el mapa
            function addMarker(bike) {
                var marker = new google.maps.Marker({
                    position: {
                        lat: bike.latitude,
                        lng: bike.longitude
                    },
                    map: map,
                    title: 'Bicicleta #' + bike.id
                });
                markers.push(marker);
            }

            // Limpiar los marcadores anteriores
            function clearMarkers() {
                markers.forEach(marker => marker.setMap(null));
                markers = [];
            }
        </script>
        @endsection -->


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




        @include('footer')

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