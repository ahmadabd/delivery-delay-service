<?php

namespace App\Repositories\Order;

use App\Enums\TripStatus;
use App\Models\Order;

class OrderImp implements OrderInt {
    public function createDelayReport(Order $order, $status)
    {
        $order->delayReports()->create([
            'status' => $status
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
