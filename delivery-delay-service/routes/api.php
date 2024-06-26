<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('vendor/delay/reports/{vendor}', [VendorController::class, 'reportWeekly'])->name("vendorReportsWeekly");
Route::get('report/order/delay/{order}', [OrderController::class, 'delayReport'])->name("OrderDelayReport");
Route::get('new/report/agent/{agent}', [AgentController::class, 'requestForNewDelayReport'])->name('requestForNewDelayReport');