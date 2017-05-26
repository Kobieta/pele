<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    public function generateActivationLink()
    {
        $encryptedEmail = encrypt($this->email);

        $this->activation_link = route('listings.index') . '/account/activation/' . $encryptedEmail;
    }

    /**
     * Stores user's email
     * @var string
     */
    private $email;

    /**
     * Stores account activation link
     * @var string
     */
    private $activation_link;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->generateActivationLink();
        return $this->subject('Aktywuj swoje konto w aplikacji Epelemele')
            ->view('emails.users.account_activation')
            ->with('activation_link', $this->activation_link);
    }
}
