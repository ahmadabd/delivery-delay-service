<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;

interface VendorInt
{
    public function getVendorDelays(Vendor $vendor);
}
