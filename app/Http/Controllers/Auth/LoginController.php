<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp;

use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function authenticated(Request $request, User $user)
    {
        $client = new GuzzleHttp\Client();
        $res = $client->request('POST', 'http://127.0.0.1:3000/api/auth/signin', [
            GuzzleHttp\RequestOptions::JSON => ['password' => $user->password, 'email' => $user->email]
            ]);
        \Session::put('APItoken', json_decode($res->getBody())->accessToken);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
