<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();



        //Authenticate user

        $user = User::where('email', $facebookUser->getEmail())->first();

        if($user) {
            echo 'Użytkownik o takim adresie email istnieje. Logowanie...<br>';
            Auth::Login($user);
            //Logowanie użytkownika
            echo 'Użytkownik o emailu '. $user->email .' został zalogowany.';
        } else {
            echo 'Utkownik o takim adresie email nie istnieje, tworzenie... <br>';

            $user = new User();

            $email = $facebookUser->getEmail();

            $user->name = explode('@', $email)[0];
            $user->email = $email;
            $user->save();

            Auth::Login($user);
            echo 'Użytkownik o emailu '. $user->email .' został stworzony.';
        }
        //dd($facebookUser);
        // $user->token;
    }
}