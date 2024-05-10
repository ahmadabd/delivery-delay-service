<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Repositories\Agent\AgentInt;

class AgentController extends Controller
{
    public function __construct(public AgentInt $agentRepository)
    {}

    public function requestForNewDelayReport(Request $request, Agent $agent)
    {
        if (!$this->agentRepository->checkAgentHasProcessingDelayReport($agent)) {
            
            $this->agentRepository->giveNewDelayReport($agent);

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
