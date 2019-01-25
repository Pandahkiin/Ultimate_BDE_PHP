<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site\Repetition;

class SuggestionsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $repetitions = Repetition::all();
        return view('suggestions.main', compact('repetitions'));
    }
}