<?php

namespace Tests\Feature;

use App\Models\DelayReport;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VendorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_reports() 
    {
        $vendor = Vendor::factory()->create();

        dd($vendor);

        $order = Order::factory()->create([
            'vendor_id' => $vendor->id
        ]);
        $delayReport1 = DelayReport::factory()->create([
            'order_id' => $order->id,
        ]);
        $delayReport2 = DelayReport::factory()->create([
            'order_id' => $order->id,
        ]);

        $response = $this->getJson(route("vendorReports", $vendor));

        dd($response->json());
    }
}
