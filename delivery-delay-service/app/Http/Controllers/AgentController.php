<?php

namespace App\Http\Controllers;

use App\Enums\DelayReportStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\DelayReport;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function requestForNewDelayReport(Request $request, Agent $agent)
    {
        if (!$agent->delayReport()->where('status', DelayReportStatus::PROCESSING)->exists()) {
            
            $delayReport = DelayReport::where('status', DelayReportStatus::WAITING)->oldest()->first();
            
            DB::transaction(function () use ($agent, $delayReport) {
                $agent->delayReport()->attach($delayReport);
                
                $delayReport->status = DelayReportStatus::PROCESSING;
                $delayReport->save();
            });

            return response()->json([
                'status' => 'Success',
            ]);
        }

        return response()->json([
            'status' => 'Failed',
            'message' => 'Agent already has a delay report request',
        ]);
    }
}
