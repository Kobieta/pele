<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AnswersNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($authorEmail, $userEmail)
    {
        $this->userEmail = $userEmail;
        $this->authorEmail = $authorEmail;
    }

    /**
     * @var User
     */
    protected $authorEmail;


    /**
     * @var User
     */
    protected $userEmail;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->authorEmail);
        return
            $this->subject('Przyjaciel odpowiedział na Twoje pytania!')
            ->view('emails.users.account_activation')
            ->with([
                'user' => $this->user,
                'author' => $this->author
            ]);
    }
}
