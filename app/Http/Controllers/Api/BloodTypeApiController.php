<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BloodTypes = BloodType::all();
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $BloodTypes
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
        if (BloodType::where('name', $request->name)->count()) {
            return [
                "status" => 1,
                "message" => 'name already exist',
            ];
        } else {
            $newGov = new BloodType;
            $newGov->name = $request->name;
            $newGov->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => BloodType::where('name', $request->name)->first()
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
        $BloodType = BloodType::find($id);
        return [
            "status" => 1,
            "message" => 'success',
            "data" => $BloodType
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
        if (!BloodType::find($id)->count()) {
            return [
                "status" => 1,
                "message" => 'name doen not exist',
            ];
        } else {
            $newGov = BloodType::find($id);
            $newGov->name = $request->name;
            $newGov->save();
            return [
                "status" => 1,
                "message" => 'success',
                "data" => BloodType::where('name', $request->name)->first()
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
