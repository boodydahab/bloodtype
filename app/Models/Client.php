<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'password', 'name', 'blood_type_id', 'last_donation_date', 'city_id', 'pin_code', 'client_id');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function Cities()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function donation_request()
    {
        return $this->belongsTo('App\Models\Donation_request');
    }

    public function contacts()
    {
        return $this->belongsTo('App\Models\contacts\Contacts');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorates');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notification()
    {
        return $this->belongsToMany('App\Models\Notification\Notification');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

}
