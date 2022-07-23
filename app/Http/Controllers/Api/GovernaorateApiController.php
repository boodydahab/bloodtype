<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernaorateApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $governorates
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Governorate::where('name', $request->gover)->count()) {
            return [
                "status" => 1,
                "message" => 'gover already exist',
            ];
        } else {
            $newGov = new Governorate;
            $newGov->name = $request->gover;
            $newGov->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => Governorate::where('name', $request->gover)->first()
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $governorate = Governorate::find($id);
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $governorate
        ];
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
        if (!Governorate::find($id)->count()) {
            return [
                "status" => 1,
                "message" => 'gover doen not exist',
            ];
        } else {
            $newGov = Governorate::find($id);
            $newGov->name = $request->gover;
            $newGov->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => Governorate::where('name', $request->gover)->first()
            ];
        }
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
