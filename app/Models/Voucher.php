<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'voucher_code',
        'voucher_amount',
        'voucher_status',
        'expired_at',
    ];

    protected $casts = [
        'expired_at' => 'datetime',
        'voucher_amount' => 'decimal:2',
    ];

    /**
     * Check if voucher is expired
     */
    public function isExpired(): bool
    {
        return $this->expired_at && now()->greaterThan($this->expired_at);
    }

    /**
     * Scope to get only non-expired vouchers
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
        });
    }
}
