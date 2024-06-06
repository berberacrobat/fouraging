<?php

namespace App\Http\Controllers;

use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use App\Http\Resources\ForageCollection;
use App\Http\Resources\ForageListCollection;
use App\Http\Resources\ForageResource;
use App\Http\Resources\ForageSimpleResource;
use App\Models\Address;
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
        $forages = new ForageCollection(Forage::all());

        return $forages;
        // Return Json Response
       // return response()->json([$forages],200);
    }

    public function foragesList()
    {
        // All Areas
        $forages = ForageSimpleResource::collection(Forage::all());

        //return $forages;
        // Return Json Response
        return response()->json($forages,200);
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
        $forage = new ForageResource(Forage::find($id));
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

        $areas = new AreaCollection($forage->areas);

        return $areas;
        //dd("Test");
    }

    public function forageArea(Request $request, Forage $forage, Area $area){

        return $forage && $area && $forage == $area->forage ?

            new AreaResource($area) : response()->json(['error' => 'Resource not found'], 404);;
        //$areas = $forage->areas;
        //dd("Test");
    }

    public function forageAreaStore(Request $request, Forage $forage)
    {
        //return $request->toArray();
        $newLocation = json_decode($request->input('newForageStation'), true);

        $newArea = new Area();
        $newArea->forage()->associate( $forage);

        $newAddress = new Address();
        $newAddress->address ="Test";
        $newAddress->sub_address ="Test 2";
        $newAddress->city = "City test";
        $newAddress->zip_code = "Zip code";
        $newAddress->country = "Country";
        $newAddress->latitude =  $newLocation['position']['latitude'];
        $newAddress->longitude = $newLocation['position']['longitude'];

        $newAddress->save();

        $newArea->address()->associate( $newAddress );


        //$newArea->address_id = 1;
        $newArea->name = $newLocation['name'];
        $newArea->image = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQALJiATjTXuSriYCuWy9Ai0jO0e-nMaY6a_w&usqp=CAU";
        $newArea->description = $newLocation['description'];

        $newArea->save();

        return response()->json([
            //'forage'=> new ForageResource($forage),
           // 'New Area'=> new AreaResource($newArea),
            'New location', $newLocation,
            'name', $newLocation['name'],
            'description', $newLocation['description'],
            'forageId', $newLocation['forageId'],
        ],200);
       // return $forage;
    }
}
