<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    use HasFactory;

    // Table name is optional if it matches the model name in plural form
    protected $table = 'logs';

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'action',
        'created_at',
        'updated_at',
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
