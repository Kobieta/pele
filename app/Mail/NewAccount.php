<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class NewAccount extends Mailable
{
    use Queueable, SerializesModels, ResetsPasswords;

    /**
     * Stores user
     *
     * @var User
     */
    private $user;

    /**
     * Stores generated password
     * @var
     */
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // mail subject
        return $this->subject('Twoje konto zostało założone!')
            ->view('emails.users.new_account')
            ->with(['password' => $this->password, 'user' => $this->user]);
    }
}
