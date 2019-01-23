<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\Goodie;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $goodies = Goodie::paginate(10);
        $bestSellers = Goodie::all()->sortByDesc(function($goodie){
            return $goodie->purchase_order;
        })->take(3);
        return view('shop.main', compact('goodies', 'bestSellers'));
        //return var_dump($bestSeller);
    }

    public function addGoodie(Request $request) {
        $newGoodie = json_decode($request->message);

        try {
            $event = Goodie::create([
                'name' => $newGoodie->name,
                'image' => $newGoodie->image,
                'description' => $newGoodie->description,
                'price' => $newGoodie->price,
                'stock' => $newGoodie->stock,
                'purchase_order' => 0,
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
                'status' => 'failure',
                'msg' => $e->getMessage()
            );
            return response()->json($response);
        }
    }
}