<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('client_id', 'title', 'image', 'content', 'category_id','publish_date');
    // protected $appends = array('thumbnail_full_path', 'is_favourite');
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // public function getThumbnailFullPathAttribute()
    // {
    //     return asset($this->thumbnail);
    // }

    // protected function getIsFavouriteAttribute()
    // {
    //     $user = Auth::guard('client-web')->user();

    //     $favourite = Post::whereHas('clients', function ($query) use($user) { // Call to a member function whereHas() on null
    //         $query->where('client_id', $user->id);
    //     })->find($this->id);
    //     if ($favourite) {
    //         return true;
    //     }
    //     return false;
    // }


    public function Post()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
