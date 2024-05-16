<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'menu_number', 'menu_number_addition', 'dish_type_id'];
    public function dishType(): BelongsTo
    {
        return $this->belongsTo(DishType::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
