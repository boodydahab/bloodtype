<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function governorates()
    {
        return $this->belongsTo('\Governorates');
    }

}