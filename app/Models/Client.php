<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_prefix',
        'phone_number',
        'canton',
        'services',
        'hours',
        'total_price',
        'service_date',
    ];

    protected function casts(): array
    {
        return [
            'service_date' => 'date',
            'hours' => 'integer',
            'total_price' => 'integer',
        ];
    }

    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    public function getFullPhoneAttribute(): string
    {
        return "{$this->phone_prefix} {$this->phone_number}";
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
