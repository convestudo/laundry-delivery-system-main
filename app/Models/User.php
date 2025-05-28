<?php

// User.php Model
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role'
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class);
    }
    public function delivery()
    {
        return $this->hasOne(Delivery::class, 'user_id');
    }
}