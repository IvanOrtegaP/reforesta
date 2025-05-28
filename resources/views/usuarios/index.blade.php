@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <h2>Usuarios</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nick</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Karma</th>
                <th>Avatar</th>
                <th>Eventos Organizados</th>
                <th>Eventos Participados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nick }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->karma }}</td>
                    <td>
                        @if($usuario->avatar)
                            <img src="{{ asset('storage/avatars/' . $usuario->avatar) }}" alt="Avatar" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($usuario->eventosOrganizados->count() > 0)
                            <ul>
                                @foreach($usuario->eventosOrganizados as $evento)
                                    <li>{{ $evento->nombre }} ({{ $evento->fecha }})</li>
                                @endforeach
                            </ul>
                        @else
                            Ninguno
                        @endif
                    </td>
                    <td>
                        @if($usuario->eventosParticipados->count() > 0)
                            <ul>
                                @foreach($usuario->eventosParticipados as $evento)
                                    <li>{{ $evento->nombre }} ({{ $evento->fecha }})</li>
                                @endforeach
                            </ul>
                        @else
                            Ninguno
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection