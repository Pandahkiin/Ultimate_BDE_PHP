<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Event;
use App\Models\Site\Repetition;

class AdminController extends Controller
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
        $repetitions = Repetition::all();
        return view('admin.main', compact('repetitions'));
    }

    public function addEvent(Request $request) {
        $newEvent = json_decode($request->message);

        try {
            $event = Event::create([
                'name' => $newEvent->name,
                'date' => $newEvent->date,
                'image' => $newEvent->image,
                'description' => $newEvent->description,
                'price_participation' => $newEvent->price,
                'id_Campuses' => Auth::user()->id_campus,
                'id_Repetitions' => $newEvent->reccurency
            ]);
    
            $response = array(
                'status' => 'success',
                'msg' => 'Événement créer avec succés !',
            );
            return response()->json($response);
        }
        catch (\Exception $e) {
            $response = array(
                'status' => 'failure',
                'msg' => 'Whoops, Un problème à eu lieu durant la création de l\'événement ...',
            );
            return response()->json($response);
        }
    }
}