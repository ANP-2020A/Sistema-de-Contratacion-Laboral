<?php

namespace App\Http\Controllers;

use App\Estudio;
use App\Http\Resources\Estudio as EstudioResource;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    public static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        //'body.required'=>'El body no es valido',
    ];
    public function index()
    {
        return response()->json(EstudioResource::collection(Estudio::all()),200);
    }

    public function show(Estudio $estudios)
    {
        $this->authorize('view',$estudios);
        return response()->json(new EstudioResource($estudios),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Estudio::class);
        $request->validate([
            'institucion' => 'required|string|max:255',
            'nivel' => 'required|string',
            'nivel_ingles' => 'nullable|string|20',
            'fecha_inicio' => 'required|date',
            'fecha_finalización' => 'required|date',
        ],self::$messages);
        $estudios = Estudio::create($request->all());
        return response()->json($estudios, 201);
    }

    public function update(Request $request, Estudio $estudios)
    {
        $this->authorize('update',$estudios);
        $request->validate([
            'institucion' => 'required|string|max:255',
            'nivel' => 'required|string',
            'nivel_ingles' => 'required|string|20',
            'fecha_inicio' => 'required|date',
            'fecha_finalización' => 'required|date',
        ],self::$messages);
        $estudios->update($request->all());
        return response()->json($estudios, 200);
    }

    public function delete(Request $request, Estudio $estudios)
    {
        $this->authorize('update',$estudios);
        $estudios->delete();
        return response()->json(null, 204);
    }
}
