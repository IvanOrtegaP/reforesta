@extends('layouts.app')

@section('title', 'Especies')

@section('content')
    <h2>Especies</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Científico</th>
                <th>Crecimiento</th>
                <th>Región</th>
                <th>Clima</th>
                <th>Foto</th>
                <th>Eventos</th>
                <th>Beneficios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($especies as $especie)
                <tr>
                    <td>{{ $especie->id }}</td>
                    <td>{{ $especie->nombre_cientifico }}</td>
                    <td>{{ $especie->crecimiento }}</td>
                    <td>{{ $especie->region }}</td>
                    <td>{{ $especie->clima }}</td>
                    <td>
                        @if($especie->foto)
                            <img src="{{ asset('storage/especies/fotos/' . $especie->foto) }}" alt="Foto" width="100">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($especie->eventos->isNotEmpty())
                            <ul>
                                @foreach($especie->eventos as $evento)
                                    <li>
                                        {{ $evento->nombre }} ({{ $evento->pivot->cantidad }} unidades)
                                        <br><small>{{ $evento->fecha }} - {{ $evento->ubicacion }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            No hay eventos registrados
                        @endif
                    </td>
                    <td>
                        @if($especie->beneficios->isNotEmpty())
                            <ul>
                                @foreach($especie->beneficios as $beneficio)
                                    <li>{{ $beneficio->descripcion }}</li>
                                @endforeach
                            </ul>
                        @else
                            No hay beneficios registrados
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('especies.edit', $especie->id) }}">Editar</a>
                        <form action="{{ route('especies.destroy', $especie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta especie?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection