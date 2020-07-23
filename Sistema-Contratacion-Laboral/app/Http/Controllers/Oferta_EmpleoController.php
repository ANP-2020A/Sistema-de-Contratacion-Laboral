<?php

namespace App\Http\Controllers;

use App\Oferta_Empleo;
use Illuminate\Http\Request;

class Oferta_EmpleoController extends Controller
{
    public function index()
    {
        return Oferta_Empleo::all();
    }

    public function show(Oferta_Empleo $ofertaempleo)
    {
        return $ofertaempleo;
    }

    public function store(Request $request)
    {
        $ofertaempleo = Oferta_Empleo::create($request->all());
        return response()->json($ofertaempleo, 201);
    }

    public function update(Request $request, Oferta_Empleo $ofertaempleo)
    {

        $ofertaempleo->update($request->all());
        return response()->json($ofertaempleo, 200);
    }

    public function delete(Request $request, Oferta_Empleo $ofertaempleo)
    {
        $ofertaempleo->delete();
        return response()->json(null, 204);
    }
}
