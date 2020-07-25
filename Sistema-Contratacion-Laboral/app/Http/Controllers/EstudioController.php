<?php

namespace App\Http\Controllers;

use App\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    public function index()
    {
        return Estudio::all();
    }

    public function show(Estudio $estudios)
    {
        return $estudios;
    }

    public function store(Request $request)
    {
        $estudios = Estudio::create($request->all());
        return response()->json($estudios, 201);
    }

    public function update(Request $request, Estudio $estudios)
    {

        $estudios->update($request->all());
        return response()->json($estudios, 200);
    }

    public function delete(Request $request, Estudio $estudios)
    {
        $estudios->delete();
        return response()->json(null, 204);
    }
}
