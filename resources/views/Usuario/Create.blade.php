@section('title', 'Usuarios')
@include('header')

<body>

    @include('sidebar')


    @section('tabla', 'Usuarios')
    @include('navbar')

    @include('cards')

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

            cambiarFondo('usuario');
            cambiarIcono('usuarioIcon');
            cambiarTexto('usuarioText');
        </script>
        
<!-- Recent Sales Start -->
		<div class="container-fluid pt-4 px-4">
      <div class="bg-secondary text-center rounded p-4">
			<div class="container-fluid pt-4 px-4">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Formulario Usuario</h6>
                            <form action="{{ url('Usuario')}}" method="POST">
															@csrf
															<div class="mb-3">

                                    <input type="name" hidden id="name" name="remember_token" value="">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="name" class="form-control" id="name" name="nombre" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                                </div>

																<div class="mb-3">
                                    <label for="status" class="form-label">Estado</label>
                                    <input type="number" class="form-control" id="status" name="estado" required>
                                </div>
                                
                                <button type="submit" class="btn btn-success">Enviar</button>
                            </form>
                        </div>
                    </div>
			</div>
		</div>



		

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