<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation_request extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'city_id', 'hospitsl_name', 'hospital_address', 'bags_num', 'details', 'blood_type_id', 'latitude', 'longitude');

    public function donation_Request()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function notification()
    {
        return $this->belongsTo('App\Models\Notification\Notification');
    }

}