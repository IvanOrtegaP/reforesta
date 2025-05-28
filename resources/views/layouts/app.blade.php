<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <h1 class="text-center mb-4">REFORESTA</h1>
    <nav class="mb-4">
        @auth
            <a href="{{ route('usuarios.index') }}">Usuarios</a>
            <a href="{{ route('especies.index') }}">Especies</a>
            <a href="{{ route('eventos.index') }}">Eventos</a>

            <a href="{{ route('usuarios.create') }}">Añadir Usuario</a>
            <a href="{{ route('eventos.create') }}">Añadir Evento</a>
            <a href="{{ route('especies.create') }}">Añadir Especie</a>
            <a href="{{ route('perfil') }}">Usuario: {{ Auth::user()->nick }}</a>
        @else
            <a href="{{ route('login.form') }}" class="btn btn-primary">Login</a>
        @endauth
    </nav>
    <div class="content">
        @yield('content')
    </div>


</body>

</html>