<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBagDetail extends Model
{
    use HasFactory;

    protected $table = 'service_bag_details'; // optional, Laravel will guess this correctly

    protected $fillable = [
        'service_management_id',
        'bag_size',
        'weight_per_kg',
        'price',
    ];

    // Define relationship to ServiceManagement
    public function service()
    {
        return $this->belongsTo(ServiceManagement::class, 'service_management_id');
    }
}

