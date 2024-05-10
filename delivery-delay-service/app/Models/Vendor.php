<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vendor extends Model
{
    use HasFactory;

    // Relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function delayReports(): HasManyThrough
    {
        return $this->hasManyThrough(DelayReport::class, Order::class, 'vendor_id', 'order_id', 'id', 'id');
    }
}
