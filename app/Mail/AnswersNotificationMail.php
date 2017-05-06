<?php

namespace App\Mail;

use App\Listing;
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
    public function __construct($author_listing_id, $user)
    {
        $this->author = User::where('id', $author_listing_id)->first();
        $this->user = $user;
        $this->listing = Listing::where('user_id', $author_listing_id)->first();
    }

    /**
     * @var User
     */
    private $author;


    /**
     * @var User
     */
    private $user;

    /**
     * @var Listing
     */
    private $listing;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->author->email);
        return
            $this->subject('Znajomy odpowiedział na Twoją listę!')
            ->view('emails.friends.answers')
            ->with([
                'user' => $this->user,
                'author' => $this->author,
                'listing' => $this->listing
            ]);
    }
}
