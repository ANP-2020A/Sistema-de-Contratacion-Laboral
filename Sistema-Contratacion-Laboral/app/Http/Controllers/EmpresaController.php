<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Resources\OfertaCollection as EmpresaCollection;
use App\Http\Resources\Empresa as EmpresaResource;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',

    ];
    public function index()
    {
        return new EmpresaCollection(Empresa::paginate());
    }
    public function show(Empresa $empresa)
    {
        $this->authorize('view', $empresa);
        return response()->json(new EmpresaResource($empresa), 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required|string',
            'ruc_cedula' => 'required|string',
            'celular' => 'required|string',
            'sector' => 'required|string',
            'ubicacion' => 'required|string',
            'actividad' => 'required|string',

        ],self::$messages);
        $empresa = Empresa::create($request->all());
        return response()->json(new EmpresaResource($empresa), 201);
    }
    public function update(Request $request, Empresa $empresa)
    {
        $this->authorize('update', $empresa);
        $request->validate([
            'empresa' => 'required|string',
            'ruc_cedula' => 'required|string',
            'celular' => 'required|string',
            'sector' => 'required|string',
            'ubicacion' => 'required|string',
            'actividad' => 'required|string',

        ],self::$messages);
        $empresa->update($request->all());
        return response()->json($empresa, 200);
    }
    public function delete(Empresa $empresa)
    {
        $this->authorize('delete', $empresa);
        $empresa->delete();
        return response()->json(null, 204);
    }
}
