<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Mail\AccountActivationMail;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{

    public function sendActivationURL()
    {
        $user = Auth::user();
        try {
            $user->sendAccountActivationEmail();
        } catch(\Exception $e) {

        }

        return redirect()->back()->with([
            'message' => 'Link aktywujący konto został wysłany. Sprawdź skrzynkę pocztową.',
            'class' => 'succes_message'
        ]);
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
