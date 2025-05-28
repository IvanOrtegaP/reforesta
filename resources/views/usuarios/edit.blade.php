<div>
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nick">Nick:</label>
            <input type="text" id="nick" name="nick" value="{{ old('nick', $usuario->nick) }}">
            @error('nick')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $usuario->nombre) }}">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $usuario->apellidos) }}">
            @error('apellidos')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email', $usuario->email) }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="karma">Karma:</label>
            <input type="number" id="karma" name="karma" value="{{ old('karma', $usuario->karma) }}">
            @error('karma')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="suscrito">Suscrito:</label>
            <input type="hidden" name="suscrito" value="0">
            <input type="checkbox" id="suscrito" name="suscrito" value="1" {{ old('suscrito', $usuario->suscrito) ? 'checked' : '' }}>
            @error('suscrito')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar">
            @error('avatar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Actualizar Usuario</button>
        </div>
    </form>
</div>
