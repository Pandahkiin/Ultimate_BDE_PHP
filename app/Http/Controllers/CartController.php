<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Site\Order;
use App\Models\Site\Contain;
use App\Models\User;
use Darryldecode\Cart\CartCondition;

use App\Http\Requests\OrderNotifyRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderNotify;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
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
        $user_cart = Order::where('id_Users', Auth::id())->where('is_paid', 0);
        return view('shop.cart', compact('user_cart'));
    }

    /**
     * Add a goodie to a order, if there is no actual order create a new one
     * @param Request HTTP request with the goodie ID and goodie quantity
     */
    public function addToCart(Request $request) {
        try {
            $goodieID = $request->id_goodie;
            $quantity = $request->quantity;

            $user_cart = Order::where('id_Users', Auth::id())->where('is_paid', 0);

            if($user_cart->count() > 0)
                $order_id = $user_cart->first()->id;
            else
                $order_id = Order::create([
                    'is_paid' => 0,
                    'date' => (new \DateTime())->format('Y-m-d'),
                    'id_Users' => Auth::id()
                ])->id;

            $contain = Contain::where('id_Orders', $order_id)->where('id_Goodies', $goodieID);
            if($contain->count() > 0) {
                $old_quantity = $contain->first()->quantity;
                $contain->update(['quantity' => $quantity + $old_quantity]);
            }
            else {
                Contain::create([
                    'id_Orders' => $order_id,
                    'id_Goodies' => $goodieID,
                    'quantity' => $quantity
                ]); 
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Goodie ajouter au panier !',
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'danger',
                'message' => 'Impossible d\'ajouter le goodie au pannier',
            ]);
        }
    }

    public function sendOrderMail(Request $request){
        try {
            $orderID = $request->id_order;

            $user = Auth::user();
            $order = Order::find($orderID)->first();
            /*$order->update([
                'is_paid' => 1
            ]);*/

            $to_name = $user->firstname;
            $to_email = 'nicolas.degheselle@viacesi.fr';
            $data = array('name'=>$user->lastname);
            
            Mail::send('emails.orderNotify', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Validation de commmande ' . '$order->id');
                $message->from('armada424777@gmail.com','BDE');
            });
/*
            $dataBDE = array(
                'name'=> $user->firstname.' '.$user->lastname,
                'orderID' => $orderID,
                'email' => $user->email,
                'user_cart' => $order->contain
            );
            Mail::send('emails.orderNotify', $dataBDE, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject('Commande n°' . $order->id);
                $message->from('armada424777@gmail.com','BDE');
            });*/

            return response()->json([
                'status' => 'success',
                'message' => 'Commande envoyé !',
            ]);

        } catch(\Exception $e) {
            return response()->json([
                'status' => 'danger',
                'message' => $e->getMessage() //'Impossible de valider la commande',
            ]);
        }
    }
}
