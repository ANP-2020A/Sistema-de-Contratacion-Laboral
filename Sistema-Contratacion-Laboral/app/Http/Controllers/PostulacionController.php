<?php

namespace App\Http\Controllers;

use App\Postulacion;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{
    public function index()
    {
        return Postulacion::all();
    }

    public function show(Postulacion $postulacions)
    {
        return $postulacions;
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
