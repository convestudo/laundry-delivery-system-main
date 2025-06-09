<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_status',
        'payment_date',
        'user_id',
        'order_id',
        'stripe_email',
        'stripe_payment_intent_id',
        'stripe_charge_id',
        'currency',
        'payment_method',
        'payment_response',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
