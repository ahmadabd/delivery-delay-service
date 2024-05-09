<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function report(Request $request, Vendor $vendor)
    {
        dd($vendor);
        $delayReport = $vendor->delayReports()->get();

        dd($delayReport);
    }
}
