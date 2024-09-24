@section('title', 'Alquilar')
@include('header')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @include('sidebar')



        @include('navbar')

        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
            @foreach($bicicletas as $dato)
                <div class="col-sm-6 col-xl-3" onclick="location.href='{{ route('Alquilar.index') }} '">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4"
                        id="bloque">
                        <i class="bi bi-bicycle fa-3x text-success"
                            id="biciIcon"></i>
                        <div class="ms-3">
                            <p class="mb-2"
                                id="bloqueText">{{$dato->nombre}}</p>
                            <h6 class="mb-0">Bicicleta</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
        @endforeach


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