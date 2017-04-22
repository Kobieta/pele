<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountActivationMail;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Socialite;
use Illuminate\Support\Facades\Session;



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
     * @overwrite AuthenticateUsers\login
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];


        $rules = [
            'email' => $email,
            'password' => $password
        ];

        if(Auth::attempt($rules)) {
            $user = User::where('email', $email)->first();
            if($user->active) {
                return redirect()->to('/login');
            } else {

                Auth::logout();

                $user->sendAccountActivationEmail();

                return redirect()->to('/login')->with('not-active', 'Konto nieaktywne');
            }

        } else {

            return redirect()->back()->with('login-failed', 'Logowanie nieudane');
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

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
