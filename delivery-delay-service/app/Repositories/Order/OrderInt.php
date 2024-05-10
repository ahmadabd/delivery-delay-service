<?php

namespace App\Repositories\Order;

use App\Models\Order;

interface OrderInt
{
    public function createDelayReport(Order $order, $status);
    public function checkOrderTripStatus(Order $order);
}
