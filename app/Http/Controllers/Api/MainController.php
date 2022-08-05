<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ContactsController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Donation_request;
use App\Models\Notification\Notification;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
    public function notifications()
    {
        $notifications = Notification::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $notifications
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
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $posts
        ];
    }

    public function post($id)
    {
        $posts = Post::find($id);
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $posts
        ];
    }

    public function toggleFavourite(Request $request)
    {
        if(!$request->post_id){
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
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $posts
        ];
    }

    public function settings()
    {
        $settings = Setting::first();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $settings
        ];
    }

    public function donations()
    {
        $donation = Donation_request::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $donation
        ];
    }


    public function contacts(Request $request)
    {
        $contacts = Contact::paginate();
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $contacts
        ];
    }

}
