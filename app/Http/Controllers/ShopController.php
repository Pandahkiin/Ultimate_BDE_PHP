<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\Goodie;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $goodies = Goodie::all();
        return view('shop.main', compact('goodies'));
        //return var_dump($goodie);
    }
}