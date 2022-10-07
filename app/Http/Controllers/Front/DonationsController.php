<?php

namespace App\Http\Controllers\Front;
use App\Models\BloodType;
use App\Models\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Donations extends Controller
{
    public function donationV(){
        $cities = City::pluck('name','id')->all();
        $blood_types = BloodType::pluck('name','id')->all();
        return view('front.donations.create',compact('cities','blood_types'));
    }
}
