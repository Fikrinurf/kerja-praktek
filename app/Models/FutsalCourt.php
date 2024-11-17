<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FutsalCourt extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
