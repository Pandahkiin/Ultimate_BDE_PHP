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

    public function contain() {
        return $this->hasMany('App\Models\Site\Contain','id_Orders' ,'id');
    }

    /**
     * Total cost of one order
     * @return int
     */
    public static function totalOrderCost($orderID) {
        $order = Order::find($orderID)->contain;

        $total = 0;
        foreach($order as $contain) {
            $total += $contain->quantity*$contain->goodie->price;
        }

        return $total;
    }
}
