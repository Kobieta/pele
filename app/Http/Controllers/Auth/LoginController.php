<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Socialite;


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
     * @override AuthenticateUsers\login
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];



        $user = User::where('email', $email)->first();

        if($user->active) {

        }

        $rules = [
            'email' => $email,
            'password' => $password,
            'active' => 1
        ];


        if(Auth::attempt($rules)) {


            //return redirect()->to('/login');

        }

       // return redirect()->back();
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
