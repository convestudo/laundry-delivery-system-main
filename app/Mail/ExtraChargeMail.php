<?php

namespace App\Mail;

use App\Models\ExtraCharge;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExtraChargeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $charge;

    public function __construct(ExtraCharge $charge)
    {
        $this->charge = $charge;
    }

    public function build()
    {
        return $this->subject('Laundry Extra Charge Notification')
            ->markdown('emails.extra.charge');
    }
}
