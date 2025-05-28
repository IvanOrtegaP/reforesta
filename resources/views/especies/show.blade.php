@extends('layouts.app')

@section('title', 'Detalle de la Especie')

@section('content')
    <h2>Detalle de la Especie</h2>
    <p><strong>Nombre Científico:</strong> {{ $especie->nombre_cientifico }}</p>
    <p><strong>Crecimiento:</strong> {{ $especie->crecimiento }}</p>
    <p><strong>Región:</strong> {{ $especie->region }}</p>
    <p><strong>Clima:</strong> {{ $especie->clima }}</p>
    <p><strong>Foto:</strong></p>
    @if($especie->foto)
        <img src="{{ asset('storage/especies/fotos/' . $especie->foto) }}" alt="Foto de la Especie" width="150">
    @else
        <p>No tiene foto.</p>
    @endif
    <p><strong>Enlace:</strong> <a href="{{ $especie->enlace }}" target="_blank">Más información</a></p>
    <p><strong>Beneficios:</strong></p>
    <ul>
        @foreach($especie->beneficios as $beneficio)
            <li>{{ $beneficio->descripcion }}</li>
        @endforeach
    </ul>
    <p><strong>Eventos:</strong></p>
    <ul>
        @foreach($especie->eventos as $evento)
            <li>{{ $evento->nombre }} ({{ $evento->pivot->cantidad }} unidades)</li>
        @endforeach
    </ul>
    <a href="{{ route('especies.index') }}" class="btn btn-secondary">Volver</a>
@endsection
