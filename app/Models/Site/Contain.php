<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    protected $table = 'contains';
    public $timestamps = false;

    protected $fillable = [
        'quantity', 'id_Orders', 'id_Goodies'
    ];

    public function order(){
        return $this->hasOne('App\Models\Orders', 'id', 'id_Orders');
    }

    public function goodie(){
        return $this->hasMany('App\Models\Goodie', 'id', 'id_Goodies');
    }
}
