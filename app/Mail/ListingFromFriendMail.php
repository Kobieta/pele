<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

class ListingFromFriendMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $list_link, $friend_email)
    {
        $this->user = $user;
        $this->list_link = $list_link;
        $this->friend_email = $friend_email;
    }

    /**
     * Stores user who's sending email
     * @var User
     */
    private $user;

    /**
     * Stores friend's email
     *
     * @var string
     */
    private $friend_email;

    /**
     * Stores list link
     * @var string
     */
    private $list_link;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->to($this->friend_email);
        return $this->subject('Twój znajomy wysłał Ci listę pytań')
            ->view('emails.friends.friends_pelemele')
            ->with(['user' => $this->user, 'link' => $this->list_link]);
    }
}
