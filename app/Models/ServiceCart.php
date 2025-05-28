<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_management_id',
        'quantity',
        'service_bag_details_id',
    ];

    /**
     * Get the user who owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the service associated with the cart item.
     */
    public function service()
    {
        return $this->belongsTo(ServiceManagement::class, 'service_management_id');
    }

    /**
     * Get the bag detail (only for weight-based services).
     */
    public function bagDetail()
    {
        return $this->belongsTo(ServiceBagDetail::class, 'service_bag_details_id');
    }
}
