@extends('layouts.app')

@section('title', 'Detalle del Beneficio')

@section('content')
    <h2>Detalle del Beneficio</h2>
    <p><strong>Especie:</strong> {{ $beneficio->especie->nombre_cientifico }}</p>
    <p><strong>Descripción:</strong> {{ $beneficio->descripcion }}</p>
    <a href="{{ route('especies.show', $beneficio->especie->id) }}" class="btn btn-secondary">Ver Especie</a>
    <a href="{{ route('especies.index') }}" class="btn btn-secondary">Volver</a>
@endsection
