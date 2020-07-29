<?php

namespace App\Http\Controllers;

use App\Postulacion;
use Illuminate\Http\Request;
use App\Http\Resources\Postulacion as PostulacionResource;

class PostulacionController extends Controller
{
    public function index()
    {
        return response()->json(PostulacionResource::collection(Postulacion::all()),200);
    }

    public function show(Postulacion $postulacions)
    {
        return response()->json(new PostulacionResource($postulacions),200);
    }

    public function store(Request $request)
    {
        $postulacions = Postulacion::create($request->all());
        return response()->json($postulacions, 201);
    }

    public function update(Request $request, Postulacion $postulacions)
    {

        $postulacions->update($request->all());
        return response()->json($postulacions, 200);
    }

    public function delete(Request $request, Postulacion $postulacions)
    {
        $postulacions->delete();
        return response()->json(null, 204);
    }
}
