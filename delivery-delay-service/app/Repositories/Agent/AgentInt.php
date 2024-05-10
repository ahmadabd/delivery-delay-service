<?php

namespace App\Repositories\Agent;

use App\Models\Agent;

interface AgentInt
{
    public function checkAgentHasProcessingDelayReport(Agent $agent);

    public function giveNewDelayReport(Agent $agent);
}