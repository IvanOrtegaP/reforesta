@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>500</h1>
    <p>Ocurrió un error interno en el servidor.</p>
    <a href="{{ route('eventos.index') }}" class="btn btn-primary">Volver al Inicio</a>
</div>
@endsection
