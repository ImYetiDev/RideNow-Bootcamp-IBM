@section('title', 'RideNow')
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

        @include('cards')

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif

        <div class="container-fluid position-relative d-block p-4">
            @if(session('nombre'))
            <h2>Bienvenido, {{ session('nombre') }}!</h2>
            <!-- <p>Tipo de usuario, {{ session('tipo_usuario_string') }}!</p> -->
            @endif
        </div>

        <div class="container-fluid position-relative d-block p-4">

            <!-- <img src="{{ asset('img/untitled1.jpg')}}" alt="" style="width: 400px; height: 400px;">
            <img src="{{ asset('img/user.jpg')}}" alt="" style="width: 400px; height: 400px;"> -->



        </div>

        <footer class="footer fixed-bottom ml-4">
            @include('footer')
        </footer>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success bg-success btn-lg-square back-to-top" style="z-index: 1050;"><i class="bi bi-arrow-up"></i></a>
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