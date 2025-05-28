<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use App\Http\Requests\EspeciePostRequest;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::with(['eventos', 'beneficios'])->get();
        return view('especies.index', compact('especies'));
    }

    public function create()
    {
        return view('especies.create');
    }

    public function store(EspeciePostRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('especies/fotos', 'public');
            $data['foto'] = basename($path);
        }

        $especie = Especie::create($data);

        // Guardar beneficios si vienen del formulario
        if (!empty($data['beneficios']) && is_array($data['beneficios'])) {
            foreach ($data['beneficios'] as $beneficio) {
                if (trim($beneficio)) {
                    $especie->beneficios()->create(['descripcion' => $beneficio]);
                }
            }
        }

        return redirect()->route('especies.index')->with('success', 'Especie creada correctamente');
    }

    public function show($id)
    {
        $especie = Especie::with(['eventos', 'beneficios'])->findOrFail($id);
        return view('especies.show', compact('especie'));
    }

    public function edit($id)
    {
        $especie = Especie::with('beneficios')->findOrFail($id);
        return view('especies.edit', compact('especie'));
    }

    public function update(EspeciePostRequest $request, $id)
    {
        $especie = Especie::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('especies/fotos', 'public');
            $data['foto'] = basename($path);
        }

        $especie->update($data);

        // Actualizar beneficios
        $especie->beneficios()->delete();
        if (!empty($data['beneficios']) && is_array($data['beneficios'])) {
            foreach ($data['beneficios'] as $beneficio) {
                if (trim($beneficio)) {
                    $especie->beneficios()->create(['descripcion' => $beneficio]);
                }
            }
        }

        return redirect()->route('especies.index')->with('success', 'Especie actualizada correctamente');
    }

    public function destroy($id)
    {
        Especie::findOrFail($id)->delete();
        return redirect()->route('especies.index')->with('success', 'Especie eliminada correctamente');
    }
}
