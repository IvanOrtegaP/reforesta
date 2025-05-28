<div>
    <form action="{{ route('especies.update', $especie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="nombre_cientifico">Nombre Científico:</label>
            <input type="text" id="nombre_cientifico" name="nombre_cientifico" value="{{ old('nombre_cientifico', $especie->nombre_cientifico) }}">
            @error('nombre_cientifico')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="crecimiento">Crecimiento:</label>
            <input type="text" id="crecimiento" name="crecimiento" value="{{ old('crecimiento', $especie->crecimiento) }}">
            @error('crecimiento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="region">Región:</label>
            <input type="text" id="region" name="region" value="{{ old('region', $especie->region) }}">
            @error('region')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="clima">Clima:</label>
            <input type="text" id="clima" name="clima" value="{{ old('clima', $especie->clima) }}">
            @error('clima')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
            @error('foto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="enlace">Enlace:</label>
            <input type="text" id="enlace" name="enlace" value="{{ old('enlace', $especie->enlace) }}">
            @error('enlace')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="beneficios">Beneficios:</label>
            <div id="beneficios-list">
                @foreach(old('beneficios', $especie->beneficios->pluck('descripcion')->toArray()) as $beneficio)
                    <input type="text" name="beneficios[]" value="{{ $beneficio }}" placeholder="Beneficio" />
                @endforeach
            </div>
            <button type="button" onclick="agregarBeneficio()">Añadir otro beneficio</button>
            @error('beneficios')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit">Actualizar Especie</button>
        </div>
    </form>
</div>
<script>
    function agregarBeneficio() {
        var div = document.createElement('div');
        div.innerHTML = '<input type="text" name="beneficios[]" placeholder="Beneficio" />';
        document.getElementById('beneficios-list').appendChild(div);
    }
</script>
