<?php

namespace App\Http\Controllers;

use App\Postulacion;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Postulacion as PostulacionResource;

class PostulacionController extends Controller
{
    public static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
        //'body.required'=>'El body no es valido',
    ];
    public function index(User $user)
    {
        return response()->json(PostulacionResource::collection($user->Postulacion),200);
        //return response()->j  son(PostulacionResource::collection(Postulacion::all()),200);
    }

    public function show(Postulacion $postulacions)
    {
        return response()->json(new PostulacionResource($postulacions),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required|string|max:255',
            'fecha_postulacion' => 'required|date',
            'oferta_id'=>'required|exists:ofertas,id',
        ],self::$messages);
        $postulacions = Postulacion::create($request->all());
        return response()->json($postulacions, 201);
    }

    public function update(Request $request, Postulacion $postulacions)
    {
        $request->validate([
            'comentario' => 'required|string|max:255',
            'fecha_postulacion' => 'required|date',
            'oferta_id'=>'required|exists:ofertas,id',
        ],self::$messages);
        $postulacions->update($request->all());
        return response()->json($postulacions, 200);
    }

    public function delete(Request $request, Postulacion $postulacions)
    {
        $postulacions->delete();
        return response()->json(null, 204);
    }
}
