<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Agent extends Model
{
    use HasFactory;

    // Relations
    public function delayReport(): BelongsToMany
    {
        return $this->belongsToMany(DelayReport::class, 'agent_delivery_reports');
    }
}
