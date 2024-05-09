<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;
use App\Repositories\Vendor\VendorInt;

class VendorImp implements VendorInt {
    public function vendorDelayReport(Vendor $vendor)
    {
        return $vendor->delayReports()->get();
    }
}
