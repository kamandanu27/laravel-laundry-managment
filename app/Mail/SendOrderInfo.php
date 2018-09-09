<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrderInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $laundry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($laundry)
    {
        $this->laundry = $laundry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.name');
    }
}
