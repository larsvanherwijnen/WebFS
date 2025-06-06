<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Number;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'menu_number',
        'menu_number_addition',
        'dish_type_id',
    ];

    public function dishType(): BelongsTo
    {
        return $this->belongsTo(DishType::class);
    }

    public function orderlines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    protected function priceFormatted(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Number::currency(
                $attributes['price'],
                'EUR',
                'nl'
            )
        );
    }

    protected function dishCode(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['menu_number'] ?? $attributes['menu_number_addition']
        );
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Dish::class, 'menu_number', 'menu_number')
            ->whereNotNull('menu_number_addition');
    }
}
