
@section('content')
<div class="container">
    <h1>Bicicletas disponibles en {{ $region }}</h1>

    <div class="row">
        @forelse($bicicletas as $bicicleta)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $bicicleta->nombre }}</h4> <!-- Nombre de la bicicleta -->
                    </div>
                    <div class="card-body">
                        <p>{{ $bicicleta->descripcion }}</p> <!-- Descripción o detalles de la bici -->
                        <a href="#" class="btn btn-primary">Alquilar ahora</a> <!-- Añade funcionalidad de alquiler -->
                    </div>
                </div>
            </div>
        @empty
            <p>No hay bicicletas disponibles en esta región.</p>
        @endforelse
    </div>
</div>
@endsection
