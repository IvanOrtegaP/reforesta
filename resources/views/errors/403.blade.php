@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>403</h1>
    <p>No tienes permiso para acceder a esta página.</p>
    <a href="{{ route('eventos.index') }}" class="btn btn-primary">Volver al Inicio</a>
</div>
@endsection
