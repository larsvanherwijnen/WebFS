<?php

namespace App\Models;

use App\Enums\OrderStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    protected $casts = [
        'status' => OrderStatuses::class
    ];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
