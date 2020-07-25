<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function index()
    {
        return Oferta::all();
    }

    public function show(Oferta $ofertaempleo)
    {
        return $ofertaempleo;
    }

    public function store(Request $request)
    {
        $ofertaempleo = Oferta::create($request->all());
        return response()->json($ofertaempleo, 201);
    }

    public function update(Request $request, Oferta $ofertaempleo)
    {

        $ofertaempleo->update($request->all());
        return response()->json($ofertaempleo, 200);
    }

    public function delete(Request $request, Oferta $ofertaempleo)
    {
        $ofertaempleo->delete();
        return response()->json(null, 204);
    }

}
