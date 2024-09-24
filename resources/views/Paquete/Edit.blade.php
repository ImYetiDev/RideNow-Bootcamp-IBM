@section('title', 'Editar Paquetes')
@include('header')

<body>

    @include('sidebar')


    @section('tabla', 'Editar Paquetes')
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

        cambiarFondo('paquete');
        cambiarIcono('paqueteIcon');
        cambiarTexto('paqueteText');
    </script>

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Formulario Editar Paquetes</h6>
                    <form action="{{ route('Paquete.update', $Paquete->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="destinatario" class="form-label">Destinatario</label>
                            <input type="text" class="form-control" id="destinatario" name="destinatario" required value="{{ old('destinatario', $Paquete->destinatario) }}">
                        </div>

                        <div class="mb-3">
                            <label for="vivienda_id" class="form-label"> Vivienda</label>
                            <select id="vivienda_id" name="vivienda_id" class="form-control">
                                <option disabled selected>------Seleccionar------</option>
                                @foreach($viviendas as $vivienda)
                                <option value="{{ $vivienda->id }}" @if($vivienda->id == $Paquete->vivienda_id) selected @endif>{{ $vivienda->nomenclatura }}</option>
                                @endforeach
                            </select>

                            
                        </div>

                        <div class="mb-3">
                            <label for="recibido_por" class="form-label">Recibido Por</label>
                            <input type="text" class="form-control" id="recibido_por" name="recibido_por" required value="{{ old('recibido_por', $Paquete->recibido_por) }}">
                        </div>

                        <div class="mb-3">
                            <label for="entregado_a" class="form-label">Entregado A</label>
                            <input type="text" class="form-control" id="entregado_a" name="entregado_a" value="{{ old('entregado_a', $Paquete->entregado_a) }}">
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required value="{{ old('estado', $Paquete->estado) }}">
                        </div>

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
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