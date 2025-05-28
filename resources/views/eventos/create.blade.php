<div>
    <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}">
            @error('ubicacion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}">
            @error('fecha')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="tipo_evento">Tipo de Evento:</label>
            <input type="text" id="tipo_evento" name="tipo_evento" value="{{ old('tipo_evento') }}">
            @error('tipo_evento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="t_terreno">Tipo de Terreno:</label>
            <input type="text" id="t_terreno" name="t_terreno" value="{{ old('t_terreno') }}">
            @error('t_terreno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="usuario_id">Organizador:</label>
            <select id="usuario_id" name="usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nick }}</option>
                @endforeach
            </select>
            @error('usuario_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="participantes">Participantes:</label>
            <select id="participantes" name="participantes[]" multiple>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ collect(old('participantes'))->contains($usuario->id) ? 'selected' : '' }}>
                        {{ $usuario->nick }}
                    </option>
                @endforeach
            </select>
            @error('participantes')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label>Especies usadas:</label>
            @foreach($especies as $especie)
                <div>
                    <input type="checkbox" name="especies[{{ $especie->id }}][id]" value="{{ $especie->id }}"
                        {{ old("especies.{$especie->id}.id") ? 'checked' : '' }}>
                    {{ $especie->nombre_cientifico }}
                    <input type="number" name="especies[{{ $especie->id }}][cantidad]" min="1" placeholder="Cantidad"
                        value="{{ old("especies.{$especie->id}.cantidad") }}">
                </div>
            @endforeach
            @error('especies')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen">
            @error('imagen')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="pdf">PDF:</label>
            <input type="file" id="pdf" name="pdf">
            @error('pdf')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Crear Evento</button>
    </form>
</div>
