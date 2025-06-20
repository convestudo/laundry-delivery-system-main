<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'address',
        'pickup_date',
        'pickup_time_start',
        'pickup_time_end',
        'delivery_timing',
        'delivery_fee',
        'driver_id',
        'customer_id',
        'voucher_id',
        'voucher_amount',
        'reference_number',
        'subtotal',
        'total_amount',
        'order_status',
        'remark',
        'payment_status'
    ];

    // Relationships
    public function orderedServices()
    {
        return $this->hasMany(OrderedService::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }

    public function generateUniqueReferenceNumber()
    {
        do {
            $ref = 'RYL-' . strtoupper(Str::random(10));
        } while (Order::where('reference_number', $ref)->exists());

        return $ref;
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}


