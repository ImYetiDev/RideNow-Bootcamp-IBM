@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Participar en el evento: {{ $evento->nombre }}</h1>
        <p>Detalles del evento: {{ $evento->descripcion }}</p>

        <form action="{{ route('eventos.inscribirse', $evento->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Participar</button>
        </form>
    </div>
@endsection
