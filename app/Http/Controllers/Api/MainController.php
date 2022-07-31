<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\BloodType;
use App\Models\Donation_request;
use App\Models\Notification\Notification;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Laravel\Ui\ControllersCommand;

class MainController extends ControllersCommand
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

    public function notifications()
    {
        $notifications = Notification::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" => $notifications
        ];
    }

    public function posts(Request $request)
    {
        $posts = Post::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $posts
        ];
    }

    public function settings()
    {
        $settings = Setting::all();
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
        $contacts = Contact::all();
        return [
            "status" => 1,
            "msg" => "success",
            "data" =>  $contacts
        ];
    }
}
