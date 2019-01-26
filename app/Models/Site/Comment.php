<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $connection = 'site_data';
    protected $table = 'comments';
    public $timestamps = false;

    protected $fillable = [
        'content' , 'date', 'id_Users', 'id_Pictures'
    ];

    public function author() {
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }
}
