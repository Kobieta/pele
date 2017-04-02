<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ActivationController extends Controller
{

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
