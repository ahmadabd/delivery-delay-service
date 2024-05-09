<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VendorReportResource;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function report(Request $request, Vendor $vendor)
    {
        $delayReport = $vendor->delayReports()->get();

        return response()->json(VendorReportResource::collection($delayReport));
    }
}
