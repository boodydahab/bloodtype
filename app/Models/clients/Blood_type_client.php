<?php

namespace App/Models/clients;

use Illuminate\Database\Eloquent\Model;

class Blood_type_client extends Model 
{

    protected $table = 'blood_type_client';
    public $timestamps = true;
    protected $fillable = array('blood_type_id', 'client_id');

}