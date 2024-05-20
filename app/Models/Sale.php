<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['dish_id','quantity', 'created_at', 'updated_at'];

    protected $casts = [
    ];

    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }


    protected function CreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::make($value)->format('d-m-Y'),
        );
    }
}
