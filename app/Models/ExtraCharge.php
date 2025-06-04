<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraCharge extends Model
{
    use HasFactory;

    protected $primaryKey = 'chargeID';
    // public $incrementing = true; // or false if not auto-incrementing
    // protected $keyType = 'int'; // or 'string' if not integer

    // public function getRouteKeyName()
    // {
    //     return 'chargeID';
    // }

    protected $fillable = [
        'user_id', 'service_name', 'package_weight',
        'bag_size', 'capacity_exceeded',
        'extra_charge', 'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
