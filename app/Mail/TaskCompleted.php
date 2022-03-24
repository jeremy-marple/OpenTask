<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;


class TaskCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $titleofemail)
    {
        $this->details = $details;
        $this->titleofemail = $titleofemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;

        $title_name = $this->titleofemail;
        $presub = 'Task Complete: ';
        $subject = $presub . $title_name;
        return $this->subject($subject)
                    ->from($user_email, $user_name)
                    ->view('TaskEmail');

    }
}
