<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;
use App\Http\Resources\Oferta as OfertaResources;
use App\Http\Resources\OfertaCollection;


class OfertaController extends Controller
{
    public function index()
    {
        return new OfertaCollection(Oferta::paginate(10));
    }

    public function show(Oferta $ofertaempleo)
    {
        return response()->json(new OfertaResources($ofertaempleo),200);
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
