<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Site\Event;
use App\Models\Site\Repetition;
use App\Models\Site\Categorie;
use App\Models\Site\Register;
use App\Models\Site\Goodie;
use App\Models\Campus;

use Storage;
use PDF;

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
        $events = Event::where('id_Approbations', 2)->get();
        $suggestions = Event::where('id_Approbations', 1)->get();
        $goodies = Goodie::all();

        /* Fill select box */
        $repetitions = Repetition::all();
        $categories = Categorie::all();
        $campuses = Campus::all();

        return view('admin.main', compact('repetitions','categories','events', 'goodies', 'suggestions', 'campuses'));
    }

    public function getRegisterList(Request $request) {
        $eventID = $request->eventID;
        $fileFormat = $request->fileFormat;

        $registerList = Register::where('id_Events', $request->eventID)->get();
        $eventName = Event::find($request->eventID)->name;

        if($fileFormat == 'CSV') {
            $fileName = time().'_'.$eventName.'.csv';
            $fileContents = '';
    
            foreach($registerList as $row) {
                $fileContents .= $row->user->firstname.';'.$row->user->lastname.";\n";
            }
            Storage::put($fileName, $fileContents);
            return response()
                ->download(storage_path('/app/'.$fileName))
                ->deleteFileAfterSend();
        }
        else if($fileFormat == 'PDF') {
            $pdf = PDF::loadView('admin.pdf', compact('eventName', 'registerList'));
            $fileName = time().'_'.$eventName.'.pdf';

            return $pdf->download($fileName);
        }
    }

    public function pictureUpload(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img/upload'), $imageName);

            return response()->json([
                'status' => 'success',
                'message' => 'Image chargé avec succès !',
                'path' => '/img/upload/'.$imageName
            ]);
        }

        return response()->json([
            'status' => 'warning',
            'message' => 'Fichier invalide !'
        ]);
    }
}