@section('sidebar')
<style>
    @font-face {
        font-family: 'BebasNeue-Regular';
        src: url("{{ asset('fonts/BebasNeue-Regular.ttf') }}") format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    .logo {
        font-family: 'BebasNeue-Regular', sans-serif;
        font-size: 33;
    }
</style>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-success logo">
            <!-- <img class="rounded-circle" src="{{ asset('img/untitled1.jpg')}}" alt="" style="width: 40px; height: 40px;"> -->
            <img src="{{URL::asset('img/icono.png')}}" style="width: 40px; height: 40px;">

            </i></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ session('nombre') }}!</h6>
                <span>{{ session('tipo_usuario_string') }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('Alquilar.index') }}" class="nav-item nav-link"><i class="bi bi-house"></i>Alquilar bicicleta</a>
            <a href="{{ route('Evento.index') }}" class="nav-item nav-link"><i class="bi bi-calendar-event"></i>Eventos</a>
            <a href="{{ route('bicicletas.maps') }}" class="nav-item nav-link"><i class="bi bi-map"></i>Mapa</a>
        </div>
    </nav>
</div>
<!-- {{ route('bicicletas.map') }} -->