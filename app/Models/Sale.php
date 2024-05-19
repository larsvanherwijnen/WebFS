<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'created_at', 'updated_at'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
