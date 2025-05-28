<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceManagement extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceManagementFactory> */
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_desc',
        'service_img',
        'pieces_price',
        'calculate_by',
    ];

    public function setPriceAttribute($value)
    {
        // Remove RM and any spaces, store as numeric value
        $this->attributes['price'] = preg_replace('/[^0-9.]/', '', $value);
    }
    public function bagDetails()
    {
        return $this->hasMany(ServiceBagDetail::class, 'service_management_id');
    }
}
