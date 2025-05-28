<?php

// Delivery.php Model
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gender',
        'old',
        'vehicle_type',
        'plate_number',
        'insurance_document',
        'driver_img'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}