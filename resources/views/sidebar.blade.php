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
                        <h6 class="mb-0">David Uribe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="" class="nav-item nav-link"><i class="bi bi-house"></i> Bloques</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-calendar-event"></i>Eventos</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-box-seam"></i>Paquetes</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-bar-chart-steps"></i>Permisos</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-book"></i>Reservas</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-person-circle"></i>Residentes</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-shop-window"></i>Tipos Viviendas</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-people-fill"></i>Usuarios</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-building"></i>Viviendas</a>
                    <a href="" class="nav-item nav-link"><i class="bi bi-shop"></i>Zonas Comunes</a>
                </div>
            </nav>
        </div>
