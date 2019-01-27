<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
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
     * Upload a image on the server
     * @return JSON status, if success the image path
     */
    public function upload(Request $request) {
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