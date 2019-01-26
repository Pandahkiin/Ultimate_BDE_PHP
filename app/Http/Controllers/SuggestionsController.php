<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site\Repetition;
use App\Models\Site\Event;

class SuggestionsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bestVotes = Event::bestVotesEvents();
        $repetitions = Repetition::all();
        return view('suggestions.main', compact('repetitions', 'bestVotes'));
    }
}