<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Usuario;
use App\Models\Especie;
use App\Http\Requests\EventoPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with(['organizador', 'participantes', 'especies'])->get();
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $especies = Especie::all();
        return view('eventos.create', compact('usuarios', 'especies'));
    }

    public function store(EventoPostRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('eventos/imagenes', 'public');
            $data['imagen'] = basename($path);
        }

        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('eventos/pdfs', 'public');
            $data['pdf'] = basename($path);
        }

        $evento = Evento::create($data);

        if ($request->has('participantes')) {
            $evento->participantes()->sync($request->input('participantes'));
            $participantes = Usuario::whereIn('id', $request->input('participantes'))->get();
            foreach ($participantes as $participante) {
                $participante->increment('karma', 1);
            }
        }

        if ($request->has('especies')) {
            $syncData = [];
            foreach ($request->input('especies') as $esp) {
                if (!empty($esp['id']) && !empty($esp['cantidad'])) {
                    $syncData[$esp['id']] = ['cantidad' => $esp['cantidad']];
                }
            }
            $evento->especies()->sync($syncData);
        }

        $organizador = $evento->organizador;
        if ($organizador) {
            $organizador->sumarKarmaPorEvento();
        }

        return redirect()->route('eventos.index')->with('success', 'Evento creado correctamente');
    }

    public function show($id)
    {
        return response()->json(Evento::findOrFail($id));
    }

    public function edit($id)
    {
        $evento = Evento::with('participantes', 'especies')->findOrFail($id);
        $usuarios = Usuario::all();
        $especies = Especie::all();
        return view('eventos.edit', compact('evento', 'usuarios', 'especies'));
    }

    public function update(EventoPostRequest $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('eventos/imagenes', 'public');
            $data['imagen'] = basename($path);
        }

        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('eventos/pdfs', 'public');
            $data['pdf'] = basename($path);
        }

        $evento->update($data);

        if ($request->has('participantes')) {
            $nuevosParticipantes = collect($request->input('participantes'))->diff($evento->participantes->pluck('id'));
            $evento->participantes()->sync($request->input('participantes'));
            $usuariosNuevos = Usuario::whereIn('id', $nuevosParticipantes)->get();
            foreach ($usuariosNuevos as $usuario) {
                $usuario->increment('karma', 1);
            }
        } else {
            $evento->participantes()->detach();
        }

        if ($request->has('especies')) {
            $syncData = [];
            foreach ($request->input('especies') as $esp) {
                if (!empty($esp['id']) && !empty($esp['cantidad'])) {
                    $syncData[$esp['id']] = ['cantidad' => $esp['cantidad']];
                }
            }
            $evento->especies()->sync($syncData);
        } else {
            $evento->especies()->detach();
        }

        return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente');
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        return redirect()->route('eventos.index')->with('success', 'Evento eliminado correctamente');
    }

    public function participar($id)
    {
        $evento = Evento::findOrFail($id);
        $usuario = Auth::user();

        if (
            $evento->participantes->contains($usuario->id) ||
            $evento->usuario_id == $usuario->id
        ) {
            return redirect()->route('eventos.index')->with('info', 'Ya participas o eres el organizador.');
        }

        $evento->participantes()->attach($usuario->id);
        $usuario->increment('karma', 1);

        return redirect()->route('eventos.index')->with('success', 'Te has unido al evento.');
    }
}
