<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderedService extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service_id',
        'price',
        'qty',
        'selected_bag_size',
        'selected_bag_size_id',
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(ServiceManagement::class, 'service_id');
    }

    public function selectedBagDetail()
    {
        return $this->belongsTo(ServiceBagDetail::class, 'selected_bag_size_id');
    }
}

