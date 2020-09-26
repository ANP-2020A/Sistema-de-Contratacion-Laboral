<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;
use App\Http\Resources\Oferta as OfertaResource;
use App\Http\Resources\OfertaCollection;


class OfertaController extends Controller
{
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

    public function index()
    {
        //$this->authorize('viewAny', Oferta::class);
        return new OfertaCollection(Oferta::paginate(10));
    }

    public function show(Oferta $ofertaempleo)
    {
        $this->authorize('view', $ofertaempleo);

        return response()->json(new OfertaResource($ofertaempleo), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Oferta::class);

        $request->validate([
            'titulo_oferta' => 'required|string|unique:ofertas|max:255',
            'descripcion_oferta' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'link_google_forms' => 'required|url',
            'area_id' => 'required|exists:area_trabajos,id',
            'image' => 'required|image|dimensions:min_width=200,min_height=200',
        ], self::$messages);

        $ofertaempleo = new Oferta($request->all());
        $path = $request->image->store('public/ofertas');

        $ofertaempleo->image = $path;
        $ofertaempleo->save();

        //$ofertaempleo = Oferta::create($request->all());
        return response()->json(new OfertaResource($ofertaempleo), 201);
    }

    public function update(Request $request, Oferta $ofertaempleo)
    {
        $this->authorize('update', $ofertaempleo);

        $request->validate([
            'titulo_oferta' => 'required|string|unique:ofertas,titulo_oferta,' . $ofertaempleo->id . '|max:255',
            'descripcion_oferta' => 'required|string',
            'fecha_publicacion' => 'required|date',
            'link_google_forms' => 'required|url',
            'area_id' => 'required|exists:area_trabajos,id',
        ], self::$messages);
        $ofertaempleo->update($request->all());
        return response()->json($ofertaempleo, 200);
    }

    public function delete(Request $request, Oferta $ofertaempleo)
    {
        $this->authorize('delete', $ofertaempleo);
        $ofertaempleo->delete();

        return response()->json(null, 204);
    }

}
