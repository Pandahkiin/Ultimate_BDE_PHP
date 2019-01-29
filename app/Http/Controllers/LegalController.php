<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function disclaimer(){
        return view('legal.disclaimer');
    }

    public function policy(){
        return view('legal.privacy');
    }

    public function sales(){
        return view('legal.saleTerms');
    }
}
