<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;

    protected $fillable = [
        'name' , 'date', 'description', 'image','price_participation', 'id_Campuses','id_Repetitions', 'id_Users', 'id_Approbations'
    ];
}
