@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>404</h1>
    <p>La página que buscas no existe.</p>
    <a href="{{ route('eventos.index') }}" class="btn btn-primary">Volver al Inicio</a>
</div>
@endsection
