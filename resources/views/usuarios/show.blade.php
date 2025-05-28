@extends('layouts.app')

@section('title', 'Perfil de ' . $usuario->nick)

@section('content')
<div class="container">
    <h2>Perfil de {{ $usuario->nick }}</h2>
    <p><strong>Nick:</strong> {{ $usuario->nick }}</p>
    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
    <p><strong>Apellidos:</strong> {{ $usuario->apellidos }}</p>
    <p><strong>Email:</strong> {{ $usuario->email }}</p>
    <p><strong>Karma:</strong> {{ $usuario->karma }}</p>
    <p><strong>Suscrito:</strong> {{ $usuario->suscrito ? 'Sí' : 'No' }}</p>
    <p><strong>Avatar:</strong></p>
    @if($usuario->avatar)
        <img src="{{ asset('storage/avatars/' . $usuario->avatar) }}" alt="Avatar" width="150">
    @else
        <p>No tiene avatar.</p>
    @endif
    <p><strong>Fecha de Creación:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Última Actualización:</strong> {{ $usuario->updated_at->format('d/m/Y H:i') }}</p>
    <p><strong>Eventos Organizados:</strong></p>
    <ul>
        @foreach($usuario->eventosOrganizados as $evento)
            <li>{{ $evento->nombre }} ({{ $evento->fecha }})</li>
        @endforeach
    </ul>
    <p><strong>Eventos Participados:</strong></p>
    <ul>
        @foreach($usuario->eventosParticipados as $evento)
            <li>{{ $evento->nombre }} ({{ $evento->fecha }})</li>
        @endforeach
    </ul>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
    </form>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
