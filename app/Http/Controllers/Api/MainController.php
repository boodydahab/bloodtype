<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use App\Models\BloodType;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function governorates()
    {
        return [
            "status" => 1,
            "msg" => "success",
            "data" => Governorate::all()
        ];
    }

    public function city(Request $request)
    {
        $city = City::where('governorate_id', $request->governorate_id)->get();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $city
        ];
    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $bloodTypes
        ];
    }



    public function bloodtype($id)
    {
        $bloodType = BloodType::find($id);
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $bloodType
        ];
    }
}
