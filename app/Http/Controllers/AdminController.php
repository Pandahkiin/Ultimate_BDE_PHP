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
use App\Models\Site\Comment;
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
        $events = Event::where('id_Approbations', 2)->orWhere('id_Approbations', 12)->get();
        $suggestions = Event::where('id_Approbations', 1)->orWhere('id_Approbations',11)->get();
        $goodies = Goodie::all();
        $comments = Comment::all();

        /* Fill select box */
        $repetitions = Repetition::all();
        $categories = Categorie::all();
        $campuses = Campus::all();

        return view('admin.main', compact('repetitions','categories','events', 'goodies', 'suggestions', 'campuses', 'comments'));
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

    public function editComment(Request $request) {
        $id_picture = $request->id_Picture;
        $id_user = $request->id_User;
        $content = $request->content;
        $datetime = (new \DateTime())->format('Y-m-d');

        $comment = Comment::where([
            ['id_Pictures', $id_picture],
            ['id_Users', $id_user],
        ])->update(['content' => $content, 'date' => $datetime]);

        return response()->json([
            'status' => 'success',
            'message' => 'Modification du commentaire réussi !',
        ]);
    }
    public function reportComment(Request $request) {
        $id_picture = $request->id_Picture;
        $id_user = $request->id_User;
    
        $comment = Comment::where([
            ['id_Pictures', $id_picture],
            ['id_Users', $id_user],
        ])->update(['date' => '1970-01-01']);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Signalement du commentaire réussi !',
        ]);
    }
}