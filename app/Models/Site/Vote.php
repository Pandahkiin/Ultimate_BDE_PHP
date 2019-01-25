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

    /**
     * Check if user is have like a event
     * @return boolean
     */
    public static function haveUserVote($eventID) {
        return Vote::where('id_Users', Auth::id())->get()->contains('id_Events', $eventID);
    }

    /**
     * Return total number of like on a event
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
