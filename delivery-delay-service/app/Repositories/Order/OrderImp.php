<?php

namespace App\Repositories\Order;

use App\Enums\DelayReportStatus;
use App\Enums\TripStatus;
use App\Models\Order;

class OrderImp implements OrderInt {
    public function createDelayReport(Order $order)
    {
        $order->delayReports()->create([
            'status' => DelayReportStatus::WAITING
        ]);

        return true;
    }

    public function checkOrderTripStatus(Order $order) 
    {
        return $order->trip()
            ->whereIn('status', [TripStatus::ASSIGNED, TripStatus::AT_VENDOR, TripStatus::PICKED])
            ->exists();
    }
}
