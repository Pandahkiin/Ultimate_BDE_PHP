<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\IdeaNotifyRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\IdeaNotify;
use App\Models\User;
use App\Models\Site\Event;
 
class IdeaNotifyController extends Controller
{
    public function sendIdeaMail(){
        $user = Auth::user();
        $idea = Event::where('id_Users', '=', $user->id)->where('is_paid', '0');

        $to_name = $user->firstname;
        $to_email = $user->email;
        $data = array('name'=>$user->lastname);
    
        Mail::send('emails.orderNotify', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject("Validation d'idée " . $idea->id);
            $message->from('armada424777@gmail.com','BDE');
        });
    }
}