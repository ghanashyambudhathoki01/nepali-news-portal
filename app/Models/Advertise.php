<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $fillable = [
        'company_name', 'redirect_link', 'expire_date',
        'contact', 'ad_position', 'image'
    ];

    /**
     * Scope to get only active (non-expired) ads.
     * expire_date is stored as a DATE string (Y-m-d) in MySQL.
     */
    public function scopeActive($query)
    {
        return $query->where('expire_date', '>=', date('Y-m-d'));
    }

    /**
     * Check if ad is currently active.
     */
    public function getIsActiveAttribute(): bool
    {
        return $this->expire_date >= date('Y-m-d');
    }
}
