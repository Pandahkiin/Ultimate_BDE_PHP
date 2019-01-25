<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Site\Order;
use App\Models\Site\Contain;
use App\Models\User;
use Darryldecode\Cart\CartCondition;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $orders = Order::all();
        $users = User::all();
        $contains = Contain::all();

        $userID = $users->id;

        if(request()->ajax()){
            $items = [];

            \Cart::session($userID)->getContent()->each(function($item) use (&$items){
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ), 200, []);
        } else {
            return view('shop.cart', compact('orders', 'users', 'contains'));
        }
    }

    // public function cart(){
    //     $data = Cart::getContent();
    //     return view('shop.cart',[
    //         'data' => $data
    //     ]);
    // }

    public function add()
    {
        $userId = $users->id; // get this from session or wherever it came from

        $id = request('id');
        $name = request('name');
        $price = request('price');
        $qty = request('qty');

        $customAttributes = [
            'color_attr' => [
                'label' => 'red',
                'price' => 10.00,
            ],
            'size_attr' => [
                'label' => 'xxl',
                'price' => 15.00,
            ]
        ];

        $item = \Cart::session($userId)->add($id, $name, $price, $qty, $customAttributes);

        return response(array(
            'success' => true,
            'data' => $item,
            'message' => "item added."
        ),201,[]);
    }

    public function delete($id)
    {
        $userId = 1; // get this from session or wherever it came from

        \Cart::session($userId)->remove($id);

        return response(array(
            'success' => true,
            'data' => $id,
            'message' => "cart item {$id} removed."
        ),200,[]);
    }

    public function details()
    {
        $userId = 1; // get this from session or wherever it came from

        // get subtotal applied condition amount
        $conditions = \Cart::session($userId)->getConditions();


        // get conditions that are applied to cart sub totals
        $subTotalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'subtotal';
        })->map(function(CartCondition $c) use ($userId) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        // get conditions that are applied to cart totals
        $totalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'total';
        })->map(function(CartCondition $c) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => \Cart::session($userId)->getTotalQuantity(),
                'sub_total' => \Cart::session($userId)->getSubTotal(),
                'total' => \Cart::session($userId)->getTotal(),
                'cart_sub_total_conditions_count' => $subTotalConditions->count(),
                'cart_total_conditions_count' => $totalConditions->count(),
            ),
            'message' => "Get cart details success."
        ),200,[]);
    }
}
