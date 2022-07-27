<?php

namespace App\Http\Controllers\Api;

use App\Blood_type_client;
use App\Client_post;
use App\Contacts;
use App\Models\City;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Donation_request;
use App\Models\Governorate;
use App\Models\Notification\Client_notification;
use App\Models\Notification\Notification;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Client_governorate;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function governorates()
    {
        $governorates = Governorate::all();

        return $this->apiResponse(status:1, message:'success', $governorates);
    }

    public function cities()
    {
        $cities = City::where(function ($qury) use ($request){
            if ($request->has(key:'governorate_id'))
            {
                $qury->where('governorate_id' ,$request->governorate_id);
            }
        })->get();

        return $this->apiResponse(status:1, message:'success',  $cities);
    }

    public function post()
    {
        $posts = Post::all();

        return $this->apiResponse(status:1, message:'success',  $posts);
    }

    public function bloodtypes()
    {
        $bloodtypes = BloodType::all();

        return $this->apiResponse(status:1, message:'success', $bloodtypes);
    }

    public function notifications()
    {
        $notifications = Notification::all();

        return $this->apiResponse(status:1, message:'success', $notifications);
    }

    public function settings()
    {
        $settings = setting::all();

        return $this->apiResponse(status:1, message:'success', $settings);
    }


    public function Blood_type_client()
    {
        $Blood_type_clients = Blood_type_client::all();

        return $this->apiResponse(status:1, message:'success', $Blood_type_clients);
    }


    public function Client()
    {
        $Clients = Client::all();

        return $this->apiResponse(status:1, message:'success', $Clients);
    }

    public function Client_post()
    {
        $Client_posts = Client_post::all();

        return $this->apiResponse(status:1, message:'success', $Client_posts);
    }

    public function Donation_request()
    {
        $donation_requests = Donation_request::all();

        return $this->apiResponse(status:1, message:'success', $donation_requests);
    }


    public function Contact()
    {
        $Contacts = Contacts::all();

        return $this->apiResponse(status:1, message:'success', $Contacts);
    }

    public function Client_notification()
    {
        $Client_notifications = Client_notification::all();

        return $this->apiResponse(status:1, message:'success', $Client_notifications);
    }
    public function Client_governorate()
    {
        $Client_governorates = Client_governorate::all();

        return $this->apiResponse(status:1, message:'success', $Client_governorates);
    }


        }

    //
    // }
    // public function showGovernorates($id)
    // {
    //     $governorate = Governorate::find($id);
    //     return [
    //         "status" => 1,
    //         "message" => 'success',
    //         "data" => $governorate
    //     ];

    //     //return $this->apiResponse(status:1, message:'success', $governorates);
    // }
    // public function createGov(Request $request)
    // {
    //     if (Governorate::where('name', $request->gover)->count()) {
    //         return [
    //             "status" => 1,
    //             "message" => 'gover already exist',
    //         ];
    //     } else {
    //         $newGov = new Governorate;
    //         $newGov->name = $request->gover;
    //         $newGov->save();
    //         return [
    //             "status" => 1,
    //             "message" => 'success',
    //             "data" => Governorate::where('name', $request->gover)->first()
    //         ];
    //     }

    //     //return $this->apiResponse(status:1, message:'success', $governorates);
    // }
    // public function updateGov(Request $request,$id)
    // {
    //     if (!Governorate::find($id)->count()) {
    //         return [
    //             "status" => 1,
    //             "message" => 'gover doen not exist',
    //         ];
    //     } else {
    //         $newGov = Governorate::find($id);
    //         $newGov->name = $request->gover;
    //         $newGov->save();
    //         return [
    //             "status" => 1,
    //             "message" => 'success',
    //             "data" => Governorate::where('name', $request->gover)->first()
    //         ];
    //     }

    //     //return $this->apiResponse(status:1, message:'success', $governorates);
    // }

//     public function cities()
//     {
//         $cities = City::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $cities
//         ];


//         //return $this->apiResponse(status:1, message:'success', $cities);
//     }

//     public function clients()
//     {
//         $clients = client::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $clients
//         ];

//         //return $this->apiResponse(status:1, message:'success', $clients);
//     }

//     public function bloodtypes()
//     {
//         $bloodtypes = BloodType::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $bloodtypes
//         ];
//         //return $this->apiResponse(status:1, message:'success', $bloodtypes);
//     }
//     public function posts()
//     {
//         $posts = Post::all();
//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $posts
//         ];

//         //return $this->apiResponse(status:1, message:'success', $posts);
//     }
//     public function notifications()
//     {
//         $notifications = Notification::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $notifications
//         ];
//         //return $this->apiResponse(status:1, message:'success', $notifications);
//     }
//     public function settings()
//     {
//         $settings = Setting::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $settings
//         ];
//         //return $this->apiResponse(status:1, message:'success', $settings);
//     }
//     public function donation_requests()
//     {
//         $donation_requests = Donation_request::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $donation_requests
//         ];
//         //return $this->apiResponse(status:1, message:'success', $donation_requests);
//     }
//     public function client_governorates()
//     {

//         $client_governorates = Client_governorate::all();
//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $client_governorates
//         ];

//         //return $this->apiResponse(status:1, message:'success', $client_governorates);
//     }
//     public function client_posts()
//     {
//         $client_posts = Client_post::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $client_posts
//         ];
//         //return $this->apiResponse(status:1, message:'success', $client_posts);
//     }
//     public function client_notifications()
//     {
//         $client_notifications = Client_notification::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $client_notifications
//         ];
//         //return $this->apiResponse(status:1, message:'success', $client_notifications);
//     }
//     public function contacts()
//     {
//         $contacts = Contacts::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" => $contacts
//         ];
//         //return $this->apiResponse(status:1, message:'success', $contacts);
//     }
//     public function blood_type_clients()
//     {
//         $blood_type_clients = Blood_type_client::all();

//         return [
//             "status" => 1,
//             "message" => 'success',
//             "data" =>  $blood_type_clients
//         ];
//         //return $this->apiResponse(status:1, message:'success', $blood_type_clients);
//     }
// }
