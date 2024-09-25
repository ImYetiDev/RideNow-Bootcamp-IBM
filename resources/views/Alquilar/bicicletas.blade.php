    <div class="container">
        <h1>Bicicletas disponibles en {{ $region->nombre }}</h1>

        @if($bicicletas->isEmpty())
            <p>No hay bicicletas disponibles en esta región.</p>
        @else
            <div class="row">
                @foreach($bicicletas as $bicicleta)
                    <div class="col-md-4 bg-secondary">
                        <div class="card mb-3 bg-secondary">
                            <div class="card-header">{{ $bicicleta->nombre }}</div>
                            <div class="card-body">
                                <p>Precio: {{ $bicicleta->precio }}</p>
                                <a href="#" class="btn btn-primary">Alquilar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>