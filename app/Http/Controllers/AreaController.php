<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Http\Resources\AreaResource;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Areas
        $areas = Area::all();

        return $areas;
        // Return Json Response
        return response()->json([$areas],200);
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


    public function storePhoto(Request $request)
    {
        $area = Area::find( 1 );
        $baseurl = "http://localhost:8000";


        $fs = $_FILES;

        for ( $i = 0; $i< count($_FILES); $i++ ){

            $fileName = time()."--".$i.'-'.$_FILES["pictures-".$i]["name"];
            move_uploaded_file($_FILES["pictures-".$i]["tmp_name"], "storage/uploads/".$fileName);
            // $path = Storage::disk('local')->put("/public/uploads/".$fileName, file_get_contents($_FILES['pictures-0']['tmp_name']));
            $url = Storage::url( "uploads/".$fileName );

            $d = new Document();
            $d->name = $fileName;
            $d->url = $baseurl.$url;

            $d->concerns()->associate( $area )->save();
        }

        //$extension = pathinfo($_FILES["pictures-0"]["name"], PATHINFO_EXTENSION);

        //Storage::disk('local')->put('example.txt', 'Contents');


        return response()->json(['URL'=> $url, 'message' => 'Image uploaded', 'files count' => count( $fs ), 'files' => $fs],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Area Detail
        $area = new AreaResource( Area::find($id));
        if(!$area){
            return response()->json([
                'message'=>'Area Not Found.'
            ],404);
        }

        // Return Json Response
        return response()->json([$area],200);
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
}
