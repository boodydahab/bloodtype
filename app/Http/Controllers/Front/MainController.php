<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Donation_request;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(Request $request)
   {
        $donations = Donation_request::take(9)->get();
        $posts = Post::take(4)->get();
        $clients = Client::all();
        $bloodTypes= BloodType::all();
        $cities= City::all();
        return view('front.home', compact('posts','donations','clients','bloodTypes','cities'));

    }

    public function about()
    {
       $setting = Setting::all();
        return view('front.about', compact('setting'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactdata(Request $request )
    {
        Contact::create([
            'email' =>$request ->email,
            'subject' =>$request ->subject,
            'message' =>$request ->message,
            'client_id' =>$request ->client_id
        ]);
    }

    public function donations()
    {
       $donations = Donation_request::all();
        return view('front.donations', compact('donations'));
    }
    public function post()
    {
       $posts = Post::all();
        return view('front.post', compact('posts') );
    }


    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return responseJson(1 , 'success', $toggle);
    }

}
