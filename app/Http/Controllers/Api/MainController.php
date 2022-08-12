<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ContactsController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\donation_requests_create;
use App\Models\Notification\Notification;
use App\Models\post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\token;
use App\Http\Controllers\Api\Client;
use PhpParser\Parser\Tokens;

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

        return responseJson(1, 'success', $city);
    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();

        return responseJson(1, 'success', $bloodTypes);
    }
    public function notifications()
    {
        $notifications = Notification::all();

        return responseJson(1, 'success', $notifications);
    }

    public function bloodtype($id)
    {
        $bloodType = BloodType::find($id);

        return responseJson(1, 'success', $bloodType);
    }

    // get --> all data with where
    // all --> all data [no where]
    // paginate(15) --> all data paginated 15 in every page [page = 3]
    // take(10)->get() --> get only 10 records [limit 10]
    // first --> first one record
    // last --> last record
    // find --> get record by id
    // findOrFail --> get one record or 404 error



    public function posts()
    {
        $posts = Post::paginate();

        return responseJson(1, 'success', $posts);
    }

    public function post($id)
    {
        $posts = Post::find($id);

        return responseJson(1, 'success', $posts);
    }

    public function toggleFavourite(Request $request)
    {
        if (!$request->post_id) {
            return [
                "status" => 0,
                "msg" => "no post id"
            ];
        }
        // attach(1) --> link post 1 with user login [favourite]
        // sync(2) --> update links
        // detach(1) --> unlink post 1 from user
        // toggle(1) --> link if unlinked -- unlink if linked
        $posts = $request->user()->posts()->toggle($request->input('post_id'));

        return responseJson(1, 'success', $posts);
    }

    public function settings()
    {
        $settings = Setting::first();

        return responseJson(1, 'success', $settings);
    }

    // donationRequestCreate()
    public function donation_requests_create(Request $request)
    {
        $rules = [
            'patient_name' => 'required',
            'patient_age' => 'required:digits',
            'blood_type' => 'required|in:o-,o-,o+,A-,A+,B-,B+,AB-,AB+,',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'patient_address' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits',
        ];

        $validator = validator()->make($request->all(), $rules);
        if ($validator()->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $donationRequest = $request->user()->requests()->create($request->all());


        // $clientIds = $donationRequest->city->governorate
        // ->clients()->whereHas('bloodtypes', function($q) use ($request,$donationRequest){
        //     $q->where('blood_types.name', $donationRequest->blood_type);
        // })->pluck('clients.id')->toArray();

        $clientIds = Client::whereHas('governorates', function ($query) use ($donationRequest) {
            $query->where('governorates.id', $donationRequest->city->governorate_id);
        })->whereHas('bloodTypes', function ($query) use ($donationRequest) {
            $query->where('blood_types.id', $donationRequest->blood_type_id);
        })->pluck('clients.id')->toArray();


        if (count($clientIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'There is a case near you',
                'content' => $donationRequest->blood_type . 'I need a donor for his type',

            ]);


            $notification->clients()->attach($clientIds);

            // $tokens = Token::whereIn('client_id', $clientIds)->where('token','!=', null)->pluck('token')->toArray();
            $tokens = Token::where('token', '!=', null)->whereHas('client', function ($client) use ($donationRequest) {
                $client->whereHas('governorates', function ($query) use ($donationRequest) {
                    $query->where('governorates.id', $donationRequest->city->governorate_id);
                })->whereHas('bloodTypes', function ($query) use ($donationRequest) {
                    $query->where('blood_types.id', $donationRequest->blood_type_id);
                });
            })->pluck('token')->toArray();
            dd($tokens);
            if (count($tokens)) {
                $title = $notification->title;
                $body = $notification->content;
                $data = [

                    'donation_request_id' => $donationRequest->id
                ];

                $send = notifyByFirbase($title, $body, $tokens, $data);
            }

            $tokens = $clientIds->tokens()->where('token', '!=', '')
                ->whereIn('client_id', $clientIds)->pluck('token')->toArray();
            if (count($tokens)) {
                $audience = ['include_players_ids' => $tokens];
                $content = [
                    'Ar' => 'يوجد اشعار من' . $request->user()->name(),
                    'En' => 'you have a new notify' . $request->user()->name(),
                ];

                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'action' => 'new notify',
                    'data' => null,
                    'client' => 'client',
                    'title' => $notification->title,
                    'content' => $notification->content,
                    'donation_request_id' => $donationRequest->id
                ];
                info(json_decode($send));
                info($send);
                info("firebase result" . $send);
                $send = json_decode($send);
            }
        }

        return responseJson(1, 'successfuly add', compact('donationRequest'));
    }


    public function contacts(Request $request)
    {
        $contacts = Contact::paginate();

        return responseJson(1, 'success', $contacts);
    }
}
