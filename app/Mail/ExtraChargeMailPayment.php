<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExtraChargeMailPayment extends Mailable
{
   use Queueable, SerializesModels;

    public $charge;

    public function __construct($charge)
    {
        $this->charge = $charge;
    }

    public function build()
    {
        return $this->subject('Extra Laundry Charge Notification')
            ->view('emails.extra_charge_notification');
    }
}
