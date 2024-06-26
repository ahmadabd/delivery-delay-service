<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorReportResource;
use App\Models\Vendor;
use App\Repositories\Vendor\VendorInt;

class VendorController extends Controller
{
    public function __construct(public VendorInt $vendorRepository)
    {}

    // This method returns a vendor delays for one week
    public function reportWeekly(Request $request, Vendor $vendor)
    {
        return response()->json(VendorReportResource::collection($this->vendorRepository->getVendorDelays($vendor)));
    }
}
