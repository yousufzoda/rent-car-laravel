<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModelCar extends Model
{
    use HasFactory;
    protected $table = 'model_cars';

    public function brand(): BelongsTo
    {
        return $this->belongsTo(BrandCar::class);
    }
}
