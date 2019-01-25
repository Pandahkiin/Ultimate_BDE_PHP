<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{
    protected $table = 'events';
    public $timestamps = false;

    protected $fillable = [
        'name' , 'date', 'description', 'image','price_participation', 'id_Campuses','id_Repetitions', 'id_Users', 'id_Approbations'
    ];

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }
    public function votedBy() {
        return $this->belongsToMany('App\Models\User','site_data.votes' ,'id_Users', 'id_Events');
    }
    
    /**
     * Return events sorted by votes
     * @return int
     */
    public static function bestVotesEvents() {
        return Event::first()->votedBy->name;
    }
}
