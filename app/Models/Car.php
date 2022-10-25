<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';

    public function users(): belongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    public function model(): BelongsTo
    {
        return $this->belongsTo(ModelCar::class);
    }
}
