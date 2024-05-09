<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;
use App\Repositories\Vendor\VendorInt;

class VendorImp implements VendorInt {
    public function vendorDelayReport(Vendor $vendor)
    {
        $oneWeekAgo = now()->subWeek();

        // Return the delay reports from the last week
        return $vendor->delayReports()
            ->whereDate('delay_reports.created_at', '>=', $oneWeekAgo)
            ->orderBy("delay_reports.created_at")
            ->get();
    }
}
