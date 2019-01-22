<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'lastname' ,'firstname', 'email', 'password','id_campus', 'id_role'
    ];
}
