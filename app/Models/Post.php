<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('client_id', 'title', 'image', 'content', 'category_id');
    protected $appends = array('thumbnail_full_path', 'is_favourite');
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getThumbnailFullPathAttribute()
    {
        return asset($this->thumbnail);
    }

    protected function getIsFavouriteAttribute()
    {
        $favourite = request()->user()->whereHas('favourites', function ($query) { // Call to a member function whereHas() on null
            $query->where('client_post.post_id', $this->id);
        })->first();
        if ($favourite) {
            return true;
        }
        return false;
    }


    public function Post()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
