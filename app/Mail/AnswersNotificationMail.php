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
    public function __construct($listing_id, $author_id, $corresponding)
    {
        $this->listing = Listing::where('id', $listing_id)->first();
        $this->listing_author = User::where('id', $author_id)->first();
        $this->current_user = $corresponding;
    }

    /**
     * @var User
     */
    private $listing_author;


    /**
     * @var User
     */
    private $current_user;

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
        $this->to($this->listing_author->email);
        return
            $this->subject('Twój znajomy odpowiedział na Twoją listę!')
            ->view('emails.friends.answers')
            ->with([
                'user' => $this->current_user,
                'author' => $this->listing_author,
                'listing' => $this->listing
            ]);
    }
}
