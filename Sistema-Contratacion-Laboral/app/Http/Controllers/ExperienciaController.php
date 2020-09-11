<?php

namespace App\Http\Controllers;

use App\Experiencia;
use App\Http\Resources\Experiencia as ExperienciaResource;
use App\User;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
    ];
    public function index(User $user)
    {
        return response()->json(ExperienciaResource::collection(Experiencia::all()),200);
        //return response()->json(ExperienciaResource::collection($user->Experiencia),200);

    }

    public function show(Experiencia $experiencias)
    {
        $this->authorize('view',Experiencia::class);
        return response()->json(new ExperienciaResource($experiencias),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Experiencia::class);
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'area_trabajo' => 'required|string',
            'lugar_trabajo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_finalización' => 'required|date',
        ],self::$messages);
        $experiencias = Experiencia::create($request->all());
        return response()->json($experiencias, 201);
    }

    public function update(Request $request, Experiencia $experiencias)
    {
        $this->authorize('update',$experiencias);
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'area_trabajo' => 'required|string|max:200',
            'lugar_trabajo' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_finalización' => 'required|date',
        ],self::$messages);
        $experiencias->update($request->all());
        return response()->json($experiencias, 200);
    }

    public function delete(Request $request, Experiencia $experiencias)
    {
        $this->authorize('delete',$experiencias);
        $experiencias->delete();
        return response()->json(null, 204);
    }
}
