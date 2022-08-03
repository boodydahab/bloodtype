<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_post extends Model
{

    protected $table = 'client_post';
    public $timestamps = true;
    protected $fillable = array('client_id', 'post_id');

}
