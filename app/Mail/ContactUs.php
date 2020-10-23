<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailFromName;
    protected $mailFrom;
    protected $mailMessage;

    /**
     * ContactUs constructor.
     * @param $mailFromName
     * @param $mailFrom
     * @param $mailMessage
     */
    public function __construct($mailFromName, $mailFrom, $mailMessage)
    {
        $this->mailFromName = $mailFromName;
        $this->mailFrom = $mailFrom;
        $this->mailMessage = $mailMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact', ['mailFromName' => $this->mailFromName, 'mailFrom' => $this->mailFrom, 'mailMessage' => $this->mailMessage]);
    }
}
