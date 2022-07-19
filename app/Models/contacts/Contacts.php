<?php

namespace App/Models/contacts;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('message', 'client_id', 'subject');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}