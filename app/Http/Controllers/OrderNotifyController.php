<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\OrderNotifyRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotify;
use App\Models\User;
use App\Models\Site\Order;
 
class OrderNotifyController extends Controller
{
    public function sendOrderMail(){
        $user = Auth::user();
        $order = Order::where('id_Users', '=', $user->id)->where('is_paid', '0');

        $to_name = $user->firstname;
        $to_email = $user->email;
        $data = array('name'=>$user->lastname);
    
        Mail::send('emails.orderNotify', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Validation de commmande ' . $order->id);
            $message->from('armada424777@gmail.com','BDE');
        });
    }
}