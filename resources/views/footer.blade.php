<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Pagina hecha por</a> David Uribe y Alejandro Miranda 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
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