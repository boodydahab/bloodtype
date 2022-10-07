<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about', 'phone', 'email', 'facebook', 'twitter', 'instagram', 'whatsapp');

}
