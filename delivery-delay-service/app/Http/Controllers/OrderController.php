<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\Order\OrderInt;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function __construct(public OrderInt $orderRepository)
    {}

    // This method use for reporting a delay by user
    public function delayReport(Request $request, Order $order)
    {
        if ($this->orderRepository->checkOrderTripStatus($order)) {
            
            $newDeliveryTime = $this->ifOrderExistsInTrip($order);

            return response()->json([
                'message' => 'Your order will take at ' . $newDeliveryTime . ' minutes later',
                'minutes' => $newDeliveryTime
            ]);
        } 
                        
        if ($this->orderRepository->createDelayReport($order)){

            return response()->json([
                "status" => "Success"
            ]);
        } else {
            return response()->json([
                "status" => "Failed"
            ]);
        }
    }

    private function ifOrderExistsInTrip($order)
    {
        $response = Http::get('https://run.mocky.io/v3/122c2796-5df4-461c-ab75-87c1192b17f7');

        if ($response->successful()) {
            // TODO: if mocky.io did not work
            $newDeliveryTime = $response->body();
        } else {
            $newDeliveryTime = random_int(1, 100);
        }

        $order->delivery_time = $newDeliveryTime;
        $order->save();

        return $newDeliveryTime;
    }
}
