<?php

namespace App\Repositories\Agent;

use App\Enums\DelayReportStatus;
use App\Models\Agent;
use App\Models\DelayReport;
use Illuminate\Support\Facades\DB;

class AgentImp implements AgentInt
{
    public function checkAgentHasProcessingDelayReport(Agent $agent)
    {
        return $agent->delayReport()->where('status', DelayReportStatus::PROCESSING)->exists();
    }

    public function giveNewDelayReport(Agent $agent)
    {
        $delayReport = DelayReport::where('status', DelayReportStatus::WAITING)->oldest()->first();
            
        DB::transaction(function () use ($agent, $delayReport) {
            $agent->delayReport()->attach($delayReport);
            
            $delayReport->status = DelayReportStatus::PROCESSING;
            $delayReport->save();
        });
    }
}