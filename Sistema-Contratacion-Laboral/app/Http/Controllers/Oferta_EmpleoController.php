<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Oferta_Empleo;

class Oferta_EmpleoController extends Controller
{
    public function index()
    {
        return Oferta_Empleo::all();
    }

    public function show(Oferta_Empleo $Oferta_Empleo )
    {
        return $Oferta_Empleo;
    }

    public function store(Request $request)
    {
        $Oferta_Empleo = Oferta_Empleo::create($request->all());
        return response()->json($Oferta_Empleo, 201);
    }

    public function update(Request $request, Oferta_Empleo $Oferta_Empleo)
    {

        $Oferta_Empleo->update($request->all());
        return response()->json($Oferta_Empleo, 200);
    }

    public function delete(Request $request, Oferta_Empleo $Oferta_Empleo)
    {
        $Oferta_Empleo->delete();
        return response()->json(null, 204);
    }
}
