<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Vote extends Model
{
    protected $table = 'votes';
    public $timestamps = false;

    protected $fillable = [
        'id_Users', 'id_Events'
    ];

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }
    public function event() {
        return $this->hasOne('App\Models\Site\Event', 'id', 'id_Events');
    }

    /**
     * Check if user is registerd to an event
     *
     * @return boolean
     */
    public static function haveUserVote($eventID) {
        return Vote::where('id_Users', Auth::id())->get()->contains('id_Events', $eventID);
    }

    /**
     * Return total number of registered users
     *
     * @return int
     */
    public static function totalUsersVote($eventID) {
        $registeredEvents = Vote::select(
            DB::raw('id_Events, count(id_Users) as total'))
            ->groupBy('id_Events')->where('id_Events', $eventID)->first();
        if($registeredEvents)
            return $registeredEvents->total;
        else
            return '0';
    }
}
