<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;
use App\Http\Resources\Oferta as OfertaResource;
use App\Http\Resources\OfertaCollection;


class OfertaController extends Controller
{
    public static $messages = [
        'required'=>'El campo :attribute es obligatorio.',
    ];
    public function index()
    {
        return new OfertaCollection(Oferta::paginate(10));
    }

    public function show(Oferta $ofertaempleo)
    {
        return response()->json(new OfertaResource($ofertaempleo),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo_oferta' => 'required|string|unique:ofertas|max:255',
            'descripcion_oferta' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'link_google_forms' => 'required|url',
            'area_id'=>'required|exists:area_trabajos,id',
        ],self::$messages);
        $ofertaempleo = Oferta::create($request->all());
        return response()->json($ofertaempleo, 201);
    }

    public function update(Request $request, Oferta $ofertaempleo)
    {
        $request->validate([
            'titulo_oferta' => 'required|string|unique:ofertas,titulo_oferta,'.$ofertaempleo->id.'|max:255',
            'descripcion_oferta' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'link_google_forms' => 'required|url',
            'area_id'=>'required|exists:area_trabajos,id',
        ],self::$messages);
        $ofertaempleo->update($request->all());
        return response()->json($ofertaempleo, 200);
    }

    public function delete(Request $request, Oferta $ofertaempleo)
    {
        $ofertaempleo->delete();
        return response()->json(null, 204);
    }

}
