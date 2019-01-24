<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Event;
use App\Models\Site\Repetition;
use App\Models\Site\Categorie;
use App\Models\Site\Register;
use App\Models\Site\Goodie;

use Storage;

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
        $events = Event::all();
        $repetitions = Repetition::all();
        $categories = Categorie::all();

        return view('admin.main', compact('repetitions','categories','events'));
    }

    /**
     * Handle AJAX request : create event
     * @return response in JSON
     */
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
                'id_Users' => Auth::id(),
                'id_Repetitions' => $newEvent->reccurency,
                'id_Approbations' => 2
            ]);
    
            $response = array(
                'status' => 'success',
                'msg' => 'Événement créer avec succés !',
            );
            return response()->json($response);
        }
        catch (\Exception $e) {
            $response = array(
                'status' => 'danger',
                'msg' => 'Whoops, une erreur c\'est produite durant la création de l\'évenement'
            );
            return response()->json($response);
        }
    }

    /**
     * Handle AJAX request : create goodie
     * @return response in JSON
     */
    public function addGoodie(Request $request) {
        $newGoodie = json_decode($request->message);

        try {
            $event = Goodie::create([
                'name' => $newGoodie->name,
                'image' => $newGoodie->image,
                'description' => $newGoodie->description,
                'price' => $newGoodie->price,
                'stock' => $newGoodie->stock,
                'id_Campuses' => Auth::user()->id_campus,
                'id_Categories' => $newGoodie->categorie
            ]);
    
            $response = array(
                'status' => 'success',
                'msg' => 'Goodie créer avec succés !',
            );
            return response()->json($response);
        }
        catch (\Exception $e) {
            $response = array(
                'status' => 'danger',
                'msg' => 'Whoops, une erreur c\'est produite durant la création du goodie'
            );
            return response()->json($response);
        }
    }

    /**
     * Download file : registered list
     * @return file in specified format
     */
    public function getRegisterList(Request $request) {
        $request->eventID;
        $request->fileFormat;

        Storage::put('/app/register_list/file.csv', $data);

        $pathToFile = storage_path('/app/test.csv');
        $headers = [
            'Content-Type' => 'application/csv'
        ];
        return response()->download($pathToFile, 'test.csv', $headers);
    }

    /**
     * Delete an event
     */
}