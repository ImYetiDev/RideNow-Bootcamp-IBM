@section('sidebar')

<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-success"><i class="fa fa-user-edit me-2"></i>RideNow</h3>
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
                    <a href="" class="nav-item nav-link"><i class="bi bi-house"></i>Alquilar bicicleta</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-calendar-event"></i>Eventos</a>
                    <a href="{{ route('bicicletas.map') }}" class="nav-item nav-link"><i class="bi bi-map"></i>Mapa</a>
                </div>
            </nav>
        </div>
