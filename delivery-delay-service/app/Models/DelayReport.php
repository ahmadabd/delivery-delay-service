<?php

namespace App\Models;

use App\Enums\DelayReportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DelayReport extends Model
{
    use HasFactory;

    protected $fillable = ['status'];

    // Relations
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Scopes
    public function scopeInProcessing($query, $order)
    {
        return $query->where("order_id", $order->id)->where('status', DelayReportStatus::PROCESSING);
    }
}
