<?php

namespace App\Http\Controllers;

use App\Experiencia;
use App\Http\Resources\Experiencia as ExperienciaResource;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function index()
    {
        return response()->json(ExperienciaResource::collection(Experiencia::all()),200);

    }

    public function show(Experiencia $experiencias)
    {
        return response()->json(new ExperienciaResource($experiencias),200);
    }

    public function store(Request $request)
    {
        $experiencias = Experiencia::create($request->all());
        return response()->json($experiencias, 201);
    }

    public function update(Request $request, Experiencia $experiencias)
    {

        $experiencias->update($request->all());
        return response()->json($experiencias, 200);
    }

    public function delete(Request $request, Experiencia $experiencias)
    {
        $experiencias->delete();
        return response()->json(null, 204);
    }
}
