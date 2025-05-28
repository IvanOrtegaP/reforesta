<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reforesta</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    </head>
    <body class="font-sans antialiased bg-gray-50 text-black">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold mb-6">Bienvenido a Reforesta</h1>
            <p class="text-lg mb-6 text-center">Únete a nuestra comunidad para participar en eventos de reforestación y contribuir al medio ambiente.</p>
            <div class="flex gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('eventos.index') }}" class="px-4 py-2 bg-green-500 text-white rounded">Ir a Eventos</a>
                    @else
                        <a href="{{ route('usuarios.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Registrarse</a>
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Login</a>
                        <a href="{{ route('eventos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Ver Eventos</a>
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>
