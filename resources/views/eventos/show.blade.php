@extends('layouts.app')

@section('title', 'Detalle del Evento')

@section('content')
    <h2>Detalle del Evento</h2>
    <p><strong>Nombre:</strong> {{ $evento->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $evento->descripcion }}</p>
    <p><strong>Ubicación:</strong> {{ $evento->ubicacion }}</p>
    <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>
    <p><strong>Tipo de Evento:</strong> {{ $evento->tipo_evento }}</p>
    <p><strong>Tipo de Terreno:</strong> {{ $evento->t_terreno }}</p>
    <p><strong>Organizador:</strong> {{ $evento->organizador->nombre ?? 'N/A' }}</p>
    <p><strong>Imagen:</strong></p>
    @if($evento->imagen)
        <img src="{{ asset('storage/eventos/imagenes/' . $evento->imagen) }}" alt="Imagen del Evento" width="150">
    @else
        <p>No tiene imagen.</p>
    @endif
    <p><strong>PDF:</strong></p>
    @if($evento->pdf)
        <a href="{{ asset('storage/eventos/pdfs/' . $evento->pdf) }}" class="btn btn-primary" target="_blank">Descargar PDF</a>
    @else
        <p>No tiene PDF.</p>
    @endif
    <p><strong>Participantes:</strong></p>
    <ul>
        @foreach($evento->participantes as $participante)
            <li>{{ $participante->nombre }}</li>
        @endforeach
    </ul>
    <p><strong>Especies Usadas:</strong></p>
    <ul>
        @foreach($evento->especies as $especie)
            <li>{{ $especie->nombre_cientifico }} ({{ $especie->pivot->cantidad }})</li>
        @endforeach
    </ul>
    <a href="{{ route('eventos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
