<?php

// namespace App\Mail;

// use App\Models\ExtraCharge;
// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;

// class ExtraChargeMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $charge;

//     public function __construct(ExtraCharge $charge)
//     {
//         $this->charge = $charge;
//     }

//     public function build()
//     {
//         return $this->subject('Laundry Extra Charge Notification')
//             ->markdown('emails.extra_charge');
//     }
// }

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExtraChargeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $charge;
    public $url;

    public function __construct($charge)
    {
        $this->charge = $charge;
        $this->url = url('/payment/' . $charge->id); // Update this URL as needed
    }

    public function build()
    {
        return $this->markdown('emails.extra_charge')
                    ->subject('Extra Laundry Charge')
                    ->with([
                        'charge' => $this->charge,
                        'url' => $this->url,
                    ]);
    }
}

