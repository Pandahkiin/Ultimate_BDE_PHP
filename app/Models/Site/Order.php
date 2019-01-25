<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;

    protected $fillable = [
        'is_paid', 'date' , 'id_Users'
    ];

    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'id_Users');
    }

    public function fion(){
        return $this->belongsTo('App\Models\Site\Contain', 'id_Orders');
    }
}
