<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Site\Order;
use App\Models\Site\Contain;
use App\Models\User;
use Darryldecode\Cart\CartCondition;

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
}
