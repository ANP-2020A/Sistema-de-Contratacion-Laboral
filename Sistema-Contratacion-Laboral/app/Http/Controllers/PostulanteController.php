<?php

namespace App\Http\Controllers;

use App\Postulante;
use App\Http\Resources\OfertaCollection as PostulanteCollection;
use App\Http\Resources\Postulante as PostulanteResource;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',

    ];
    public function index()
    {
        return new PostulanteCollection(Postulante::paginate());
    }
    public function show(Postulante $postulante)
    {
        $this->authorize('view', $postulante);
        return response()->json(new PostulanteResource($postulante), 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|string',
            'provincia' => 'required|string',
            'genero' => 'required|string',
            'nacionalidad' => 'required|string'

        ],self::$messages);
        $postulante = Postulante::create($request->all());
        return response()->json(new PostulanteResource($postulante), 201);
    }
    public function update(Request $request, Postulante $postulante)
    {
        $this->authorize('update', $postulante);
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'cedula' => 'required|string',
            'provincia' => 'required|string',
            'genero' => 'required|string',
            'nacionalidad' => 'required|string'

        ],self::$messages);
        $postulante->update($request->all());
        return response()->json($postulante, 200);
    }
    public function delete(Postulante $postulante)
    {
        $this->authorize('delete', $postulante);
        $postulante->delete();
        return response()->json(null, 204);
    }
}
