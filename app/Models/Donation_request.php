<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Donation_request extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'city_id', 'hospital_name', 'hospital_address', 'bags_num', 'details', 'blood_type_id', 'latitude', 'longitude');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notification\Notification');
    }

}
