<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;

interface VendorInt
{
    public function vendorDelayReport(Vendor $vendor);
}
