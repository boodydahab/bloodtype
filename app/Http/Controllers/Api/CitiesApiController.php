<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CitiesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Citys = City::all();
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $Citys
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
        if (City::where('name', $request->name)->count()) {
            return [
                "status" => 1,
                "message" => 'name already exist',
            ];
        } else {
            $newCity = new City;
            $newCity->name = $request->name;
            $newCity->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => City::where('name', $request->name)->first()
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
        $City = City::find($id);
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $City
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
        if (!City::find($id)->count()) {
            return [
                "status" => 1,
                "message" => 'name doen not exist',
            ];
        } else {
            $newCity = City::find($id);
            $newCity->name = $request->name;
            $newCity->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => City::where('name', $request->name)->first()
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
