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

    public function getThumbnailPathAttribute()
    {
        return asset($this->thumbnail);
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
