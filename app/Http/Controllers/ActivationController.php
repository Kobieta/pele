<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Mail\AccountActivationMail;

class ActivationController extends Controller
{

    public function sendActivationURL()
    {
        Mail::to($user->email)->send(new AccountActivationMail($user->email));
    }
    
    public function activateAccount($activationCode)
    {
        $email = decrypt($activationCode);

        $user = User::where('email', $email)->first();

        if($user) {
            $user->active = 1;
            $user->save();
            if($user->active == 1) {

                return view('account.activation.succes');
            }
        }

        return view('account.activation.failed');
    }
}
