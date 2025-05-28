@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
    <h2>Eventos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Terreno</th>
                <th>Organizador</th>
                <th>Participantes</th>
                <th>Especies Usadas</th>
                <th>Imagen</th>
                <th>PDF</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->ubicacion }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->tipo_evento }}</td>
                    <td>{{ $evento->t_terreno }}</td>
                    <td>{{ $evento->organizador->nombre ?? 'N/A' }}</td>
                    <td>
                        @if($evento->participantes->isNotEmpty())
                            <ul>
                                @foreach($evento->participantes as $participante)
                                    <li>{{ $participante->nombre }}</li>
                                @endforeach
                            </ul>
                        @else
                            No hay participantes
                        @endif
                    </td>
                    <td>
                        @if($evento->especies->isNotEmpty())
                            <ul>
                                @foreach($evento->especies as $especie)
                                    <li>{{ $especie->nombre_cientifico }} ({{ $especie->pivot->cantidad }})</li>
                                @endforeach
                            </ul>
                        @else
                            No hay especies registradas
                        @endif
                    </td>
                    <td>
                        @if($evento->imagen)
                            <img src="{{ asset('storage/eventos/imagenes/' . $evento->imagen) }}" alt="Imagen del Evento" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($evento->pdf)
                            <a href="{{ asset('storage/eventos/pdfs/' . $evento->pdf) }}" class="btn btn-primary" target="_blank">Descargar PDF</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('eventos.edit', $evento->id) }}">Editar</a>
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este evento?')">Eliminar</button>
                        </form>
                        @if(auth()->check())
                            @php
                                $yaParticipa = $evento->participantes->contains(fn($p) => $p->id === auth()->id());
                                $esOrganizador = $evento->usuario_id === auth()->id();
                            @endphp
                            @if(!$yaParticipa && !$esOrganizador)
                                <form action="{{ route('eventos.participar', $evento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Participar</button>
                                </form>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection