<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'city_id' => 'required',
            'phone' => 'required',
            'last_donation_date' => 'required',
            'password' => 'required|confirmed',
            'blood_type_id' => 'required',
            'email' => 'required|unique:clients',

        ]);

        if ($validator->fails()) {
            return [
                "status" => 0,
                "message" => $validator->errors()->first(),
                "data" => $validator->errors(),
            ];
        };
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        return [
            "status" => 1,
            "message" => 'successfully',
            "data" => [
                'api_token' => $client->api_token,
                'client' => $client,
            ],
        ];
    }

    public function new_password(Request $request)
    {
        // dd( Client::where('email', $request->email)->first());
        // [
        //     "password"=>"password",
        //     "confirm_password"=>'password',
        //     "email"=>"email"
        // ];
        if ($request->password == $request->confirm_password) {
            $new_password = $request->password;
            $user = Client::where('email', $request->email)->first();
            if($user){
                $user->update(['password'=> bcrypt($new_password)]);
                return [
                    "status" => 1,
                    "msg" => "Password was succesfully chanegd",
                ];
            }else{
                return [
                    "status" => 0,
                    "msg" => "User doesn't exist",
                ];
            }

        } else {
            return [
                "status" => 0,
                "msg" => "passwords don't match",
            ];
        }
    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                "status" => 0,
                "message" => $validator->errors()->first(),
                "data" => $validator->errors(),
            ];
        }
        $user = Client::where('phone', $request->phone)->first();
        if ($user) {
            $code = rand(1111, 9999);
            $update = $user->update(['pin_code' => $code]);


            if ($update) {
                // smsMisr($request->phone, message:" your reset code is : . $code");

                Mail::to($user->email)
                    ->bcc("eng.magwad@gmail.com")
                    ->send(new ResetPassword($code));
                return [
                    "status" => 1,
                    "message" => "Approved",
                    "data" => [
                    "api_token" => $user->api_token,
                     "client" => $user,
                    'pin_code_for_test' => $code,
                    'mail_fails' => Mail::failures()
                    ],
                ];
            } else {
                return [
                    "status" => 0,
                    "message" => "try again",
                ];
            }
        } else {
            return [
                "status" => 0,
                "message" => "There is no account with this number",
            ];
        }
    }
}
            // }
            // if (Hash::check($request->password, $client->password)) {
                // smsMisr($request->phone, "your rest code is:" .$code);
