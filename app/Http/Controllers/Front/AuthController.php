<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\BloodType;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;


class AuthController extends Controller


{



    public function register()
    {
        $cities = City::all();
        $bloodtypes = BloodType::all();
        return view('front.register', compact('cities', 'bloodtypes'));
    }



    public function registersave(Request $request)
    {
    }

    function signin()
    {
        return view('front.sign-in');
    }


    function login(Request $request)
    {
        $credentials = ['phone' => $request->phone, 'password' => $request->password];
        if (Auth::guard('client-web')->attempt($credentials)) {
            # code...
            return redirect('/');
        } else {
            # code...
            $setting = Setting::all();
            return redirect('about')->with('setting', $setting);
        }
    }
}
