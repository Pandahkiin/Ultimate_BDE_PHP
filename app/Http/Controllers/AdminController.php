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

    public function getRegisterList(Request $request) {
        $eventID = $request->eventID;
        $request->fileFormat;

        Storage::put('/app/register_list/file.csv', $data);

        $pathToFile = storage_path('/app/test.csv');
        $headers = [
            'Content-Type' => 'application/csv'
        ];
        return response()->download($pathToFile, 'test.csv', $headers);
    }
}