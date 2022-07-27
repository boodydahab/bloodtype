<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return [
                    "status" => 1,
                    "message" => "Approved",
                    "data" => [
                        "api_token" => $client->api_token,
                        "client" => $client,
                    ],
                ];
            } else {
                return [
                    "status" => 0,
                    "message" => "There is no account with this number",
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
