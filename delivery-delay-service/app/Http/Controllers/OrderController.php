<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    // This method use for reporting a delay by user
    public function delayReport(Request $request, Order $order)
    {
        dd($order);

        return response()->json();
    }
}
