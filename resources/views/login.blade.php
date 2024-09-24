@section('title', 'Login')
@include('header')
 



<style>
 
 .error{
    color: red;
    text-align: center;
    font-size: .9rem;
    padding: 2px 0;
    border: 1px solid red;
    border-radius: 10px;
    margin-bottom: 10px;

 }

</style>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-success"><i class="fa fa-user-edit me-2"></i>Residencia</h3>
                            </a>
                            <h3>Inicia Sesion</h3>
                        </div>

                        <form action="check" method="POST">
    @csrf

                        @error( 'email' )
                        <div class="error">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" required autofocus value="{{ old('email') }}">
                            <label for="floatingInput">Correo Electronico</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                       
                        <button type="submit" class="btn btn-success py-3 w-100 mb-4" >Iniciar Sesion</button>
                        <p class="text-center mb-0">No tienes una cuenta? <a href="\register">Registrar</a></p>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
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