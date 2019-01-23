<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Event;
use App\Models\Site\Register;

class EventsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::all();
        $registeredEvents = Register::where('id_Users', Auth::id())->get();
        return view('events.main', compact('events', 'registeredEvents'));
    }

    public function registerEvent(Request $request) {
        $idEvent = $request->message;

        try {
            $register = Register::create([
                'id_Events' => $idEvent,
                'id_Users' => Auth::id()
            ]);
    
            $response = array(
                'status' => 'success',
                'msg' => 'Inscription réussi !',
            );
            return response()->json($response);
        }
        catch (\Exception $e) {
            $response = array(
                'status' => 'failure',
                'msg' => 'Whoops, une erreur c\'est produite durant l\'inscription ...'
            );
            return response()->json($response);
        }
    }

    public function unregisterEvent(Request $request) {
        $idEvent = $request->message;

        try {
            $unregister = Register::where([
                ['id_Users', '=' , Auth::id()],
                ['id_Events', '=' , $idEvent]
            ])->delete();
    
            $response = array(
                'status' => 'success',
                'msg' => 'Désinscription réussi !',
            );
            return response()->json($response);
        }
        catch (\Exception $e) {
            $response = array(
                'status' => 'failure',
                'msg' => $e->getMessage()//'Whoops, une erreur c\'est produite durant la désinscription ...'
            );
            return response()->json($response);
        }
    }
}