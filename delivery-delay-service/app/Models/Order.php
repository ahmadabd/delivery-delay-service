<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    // Relations
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function delayReports(): HasMany
    {
        return $this->hasMany(DelayReport::class);
    }

    public function trip(): HasOne
    {
        return $this->hasOne(Trip::class);
    }
}
