<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskFromContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * receive subject data.
     * 
     * @var string
     */
    public $subject;

    /**
     * receive email data.
     * 
     * @var string
     */
    public $email;

    /**
     * receive question data.
     * 
     * @var string
     */
    public $question;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $email, string $question)
    {
        $this->subject = $subject;
        $this->email = $email;
        $this->question = $question;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ask');
    }
}
