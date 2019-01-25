<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\Goodie;
use App\Models\Site\Order;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { $truc = Order::all();
        $goodies = Goodie::paginate(10);
        $bestSellers = Goodie::all()->sortByDesc('total_orders')->take(3);
        return view('shop.main', compact('goodies', 'bestSellers','truc'));
        //return var_dump($bestSeller);
       
    }
}