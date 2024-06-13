<?php

namespace App\Models;

use App\Enums\OrderTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    protected $casts = [
        'type' => OrderTypes::class,
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
