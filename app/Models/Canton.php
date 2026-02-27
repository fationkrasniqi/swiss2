<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $fillable = [
        'name',
        'price_per_hour',
    ];

    protected function casts(): array
    {
        return [
            'price_per_hour' => 'decimal:2',
        ];
    }

    public static function priceMap(): array
    {
        return cache()->remember('canton_prices', 3600, function () {
            return static::pluck('price_per_hour', 'name')->toArray();
        });
    }
}
