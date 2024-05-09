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

    public function report(Request $request, Vendor $vendor)
    {
        return response()->json(VendorReportResource::collection($this->vendorRepository->vendorDelayReport($vendor)));
    }
}
