<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site\Event;

class EventsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('events.main');
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
                'msg' => 'Whoops, une erreur c\'est produite durant la création de l\'évenement'
            );
            return response()->json($response);
        }
    }
}