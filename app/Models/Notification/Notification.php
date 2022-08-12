<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function donation_requests()
    {
        return $this->hasMany('App\Models\Donation_request');
    }

    public function clients()
    {
        return $this->hasMany(Clients::class);
    }

}
