<?php

namespace App\Http\Controllers;

use App\AreaTrabajo;
use Illuminate\Http\Request;
use App\Http\Resources\AreaTrabajo as AreaResource;

class TrabajosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  response()->json(AreaResource::collection(AreaTrabajo::all()),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AreaTrabajo  $areaTrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(AreaTrabajo $areaTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AreaTrabajo  $areaTrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaTrabajo $areaTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaTrabajo  $areaTrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaTrabajo $areaTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaTrabajo  $areaTrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaTrabajo $areaTrabajo)
    {
        //
    }
}
