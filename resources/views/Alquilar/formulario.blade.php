
<div class="container">
    <h1>Alquilar Bicicleta - {{ $bicicleta->marca }}</h1>

    <form action="{{ route('alquilar.guardar') }}" method="POST">
        @csrf

        <input type="hidden" name="bicicleta_id" value="{{ $bicicleta->id }}">

        <div class="mb-3">
            <label for="estacion_inicio_id" class="form-label">Estación de inicio</label>
            <select name="estacion_inicio_id" id="estacion_inicio_id" class="form-control" required>
                @foreach($estaciones as $estacion)
                    <option value="{{ $estacion->id }}">{{ $estacion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Confirmar Alquiler</button>
    </form>
</div>