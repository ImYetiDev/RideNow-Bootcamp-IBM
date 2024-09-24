<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- JavaScript -->

    <!-- Funcion cambiar estilos dependiendo la vista-->

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
</head>