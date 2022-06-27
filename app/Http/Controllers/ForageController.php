<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Forage;
use Illuminate\Http\Request;

class ForageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Areas
        $forages = Forage::all();

        return $forages;
        // Return Json Response
        return response()->json([$forages],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Forage Detail
        $forage = Forage::find($id);
        if(!$forage){
            return response()->json([
                'message'=>'Forage Not Found.'
            ],404);
        }

        // Return Json Response
        return response()->json([$forage],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function forageAreas(Request $request, Forage $forage){

        $areas = $forage->areas;

        return $areas;
        //dd("Test");
    }

    public function forageArea(Request $request, Forage $forage, Area $area){

        return $forage && $area && $forage == $area->forage ?

            $area : response()->json(['error' => 'Resource not found'], 404);;
        //$areas = $forage->areas;
        //dd("Test");
    }
}
