<?php

namespace Tests\Feature;

use App\Enums\TripStatus;
use App\Models\Order;
use App\Models\Trip;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_reports_that_is_in_trip_table() 
    { 
        $vendor = Vendor::factory()->create();
        $order = Order::factory()->create([
            'vendor_id' => $vendor->id
        ]);

        $trip = Trip::factory()->create([
            'order_id' => $order->id,
            'status' => TripStatus::ASSIGNED
        ]);

        $response = $this->getJson(route('OrderDelayReport', $order));

        $this->assertDatabaseHas('orders', [
            'delivery_time' => $response->json()["minutes"]
        ]);
    }


    /** @test */
    public function check_reports() 
    { 
        $vendor = Vendor::factory()->create();
        $order = Order::factory()->create([
            'vendor_id' => $vendor->id
        ]);

        $response = $this->getJson(route('OrderDelayReport', $order));

        $this->assertDatabaseHas('delay_reports', [
            'order_id' => $order->id
        ]);

        $response->assertJson([
            'status' => 'Success',
        ]);
    }
}
