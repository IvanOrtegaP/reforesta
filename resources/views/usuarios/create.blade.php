<div>
    <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nick">Nick:</label>
            <input type="text" id="nick" name="nick" value="{{ old('nick') }}">
            @error('nick')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            @error('apellidos')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Repetir password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="karma">Karma:</label>
            <input type="number" id="karma" name="karma" value="{{ old('karma') }}">
            @error('karma')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="suscrito">Suscrito:</label>
            <input type="hidden" name="suscrito" value="0">
            <input type="checkbox" id="suscrito" name="suscrito" value="1" {{ old('suscrito') ? 'checked' : '' }}>
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
            <button type="submit">Crear Usuario</button>
        </div>
    </form>
</div>
