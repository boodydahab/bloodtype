<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donation_requeste()
    {
        return $this->belongsTo('App\Models\Donation_request');
    }

}