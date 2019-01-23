<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\Goodie;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $goodies = Goodie::paginate(10);
        $bestSellers = Goodie::all()->sortByDesc(function($goodie){
            return $goodie->purchase_order;
        })->take(3);
        return view('shop.main', compact('goodies', 'bestSellers'));
        //return var_dump($bestSeller);
    }
}