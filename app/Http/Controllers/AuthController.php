<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function register(Request $request)
    {
    $validator = validator()->make($request->all(),[
        'name' => 'required',
        'city_id' => 'required',
        'phone' => 'required',
        'donation_last_date' => 'required',
        'password' => 'required|confirmed',
        'blood_type' => 'required|in:O-,O+,B-,B+,A-,A+,AB-,AB+',
        'email' => 'required|unique',

    ]);

    if ($validator->fails())
    {
       return responseJson(status:0, $validator->errors()->first(), $validator->errors());
    }
    $request->merge(['password' => bcrypt($request->password)]);
    $client= Client::created($request->all());
    $client->api_token = Str::random($length:60);
    $client->save();
    return responseJson(status:1, message:'successfully', [
        'api_token' => $client -> api_token,
        'client' => $client
        ]);

    }
    public function login(Request $request)
    {
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails())
        {
           return responseJson(status:0, $validator->errors()->first(), $validator->errors());
        }
       $client = Client::where('phone', $request->phone)->first();
       if ($client){
        if(Hash::check($request->password, [$client->password]))
        {
            return responseJson(status:1, Message:'Approved',[
              'api_token' => $client -> api_token, 'client'=> $client]);

        }else{
            return responseJson(status:0, Message:'There is no account with this number');
        }

       }else{
        return responseJson(status:0, Message:'There is no account with this number');
       }
    }
}

