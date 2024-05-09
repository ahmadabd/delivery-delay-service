<?php

namespace Tests\Feature;

use App\Models\DelayReport;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_reports() 
    {
        $vendor = Vendor::factory()->create();

        $order = Order::factory()->create([
            'vendor_id' => $vendor->id
        ]);
        $delayReport1 = DelayReport::factory()->create([
            'order_id' => $order->id,
            'created_at' => Carbon::now()->subWeek()->startOfDay()
        ]);
        DelayReport::factory()->create([
            'order_id' => $order->id,
            'created_at' => Carbon::now()->subMonth()->startOfDay()
        ]);

        $response = $this->getJson(route("vendorReportsWeekly", $vendor));

        $response->assertStatus(200)
            ->assertJson([
                [
                    'id' => $delayReport1->id,
                ]
            ]);
    }
}
