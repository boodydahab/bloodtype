<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

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
        $client->governorats()->attche($request->city_id);
        $bloodType = BloodType::where('name', $request->blood_type)->first();
        $client->bloodType()->attach($bloodType->id);
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

    public function resetPassword(Request $request){
        $validation = validator()->make($request->all(),
        [
            'phone' => 'required'
        ]);

        if ($validation->fails()){
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(),$data);
        }

        $user = Client::where('phone', $request->phone)->first();
        if ($user){
            $code = rand(1111,9999);
            $update = $user->update(['pin_code' => $code]);

        if ($update){

            return responseJson(1, 'check your number',['pin_code_for_test' => $code]);
        }else{
            return responseJson(0, 'try again');

        }
        }else{
            return responseJson(0, 'account is faild');
        }

    }

    public function password(Request $request)
    {
        $validation = validator()->make($request->all(),
        [
            'pin_code' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails())
        {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(),$data);
        }

        $user = Client::where('pin_code', $request->pin_code)->where('pin_code','!=',0)
        ->where('phone',$request->phone)->first();

        if ($user)
        {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;

            if ($user->save())
            {
                return responseJson(1, 'changed password successfully');
            }else{
                return responseJson(0, 'try again');
            }
        }else{
            return responseJson(0, 'this code is not vaild');
        }

    }



    public function profile(Request $request)
    {
        $validation = validator()->make($request->all(),
        [
            'password' => 'confirmed',
            'email' => Rule::unique('clients')->ignore($request->user()->id),
            'phone' => Rule::unique('clients')->ignore($request->user()->id),
        ]);
        if ($validation->fails())
        {
            $data = $validation->errors();
            return responseJson(0, $validation->errors()->first(),$data);
        }

        $loginUser = $request->user();
        $loginUser->update($request->all());


        if ($request->has('password'))
        {
            $loginUser->password = bcrypt($request->password);
        }

        $loginUser->save();
        if ($request->has('governorate_id'))
        {
            $loginUser->cities()->detach($request->city_id);
            $loginUser->governorates()->attach($request->city_id);
        }

        if ($request->has('blood_type'))
        {
            $bloodType = BloodType::where('name', request()->blood_type)->first();
            $loginUser->bloodTypes()->detach($request->$bloodType->id);
            $loginUser->bloodTypes()->attach($request->$bloodType->id);
        }




    }
}
            // }
            // if (Hash::check($request->password, $client->password)) {
                // smsMisr($request->phone, "your rest code is:" .$code);
