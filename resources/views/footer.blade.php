<!-- Footer Start -->
<div class="container-fluid pt-4 px-4 mb-0 w-75">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#" class="text-success">Desarrollado por</a> David Uribe y Diego Anacona
            </div>

        </div>
    </div>
</div>

<!-- Footer End -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function cambiarFondo(selected) {
            // Obtén el elemento con ID "miCard"
            var selected = document.getElementById(selected);

            // Desactiva la clase personalizada en todas las vistas
            selected.classList.remove('bg-secondary');

            // Activa la clase personalizada en la vista actual
            selected.classList.add('bg-success');
        }

        function cambiarIcono(icon) {
            // Obtén el elemento con ID "miCard"
            var icon = document.getElementById(icon);

            // Desactiva la clase personalizada en todas las vistas
            icon.classList.remove('text-success');

            // Activa la clase personalizada en la vista actual
            icon.classList.add('text-secondary');
        }
    });
</script>