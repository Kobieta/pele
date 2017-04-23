<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the Faceboook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return view
     */

    public function handleProviderCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::where('email', $facebookUser->getEmail())->first();

        if($user) { // User found, logging in

            Auth::Login($user);

        } else { // There is no such user, creating:

            $user = new User();

            $email = $facebookUser->getEmail();

            $user->name = explode('@', $email)[0];
            $user->email = $email;
            $user->active = 1;

            $user->save();

            Auth::Login($user);
        }

        return view('home');
    }
}