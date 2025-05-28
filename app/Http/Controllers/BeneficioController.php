<?php

namespace App\Http\Controllers;

use App\Models\Beneficio;
use App\Http\Requests\BeneficioPostRequest;

class BeneficioController extends Controller
{
    public function index()
    {
        return response()->json(Beneficio::all());
    }

    public function store(BeneficioPostRequest $request)
    {
        $beneficio = Beneficio::create($request->all());
        return response()->json($beneficio, 201);
    }

    public function show($id)
    {
        return response()->json(Beneficio::findOrFail($id));
    }

    public function update(BeneficioPostRequest $request, $id)
    {
        $beneficio = Beneficio::findOrFail($id);
        $beneficio->update($request->all());

        return response()->json($beneficio);
    }

    public function destroy($id)
    {
        Beneficio::findOrFail($id)->delete();
        return response()->json(['message' => 'Beneficio eliminado']);
    }
}
