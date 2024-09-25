@section('title', 'Alquilar')
@include('header')

@include('sidebar')

@include('navbar')

@include('cards')
<br>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        

        <div class="container" >
            <div class="row">
                @foreach($Regionales as $dato)
                <div class="col-md-4 mb-4"> <!-- Ajusta el número de columnas según tus necesidades -->
                    <div class="card bg-secondary">
                        <div class="card-header">
                            <h3 class="text-success">{{$dato->nombre}}</h3>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('alquilar.show', $dato->id) }}" class="text-success">Ver bicicletas</a>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>



        
    </div>
    <!-- Content End -->
    
    
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('footer')
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