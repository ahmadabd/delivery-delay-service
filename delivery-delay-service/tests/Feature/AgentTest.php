<?php

namespace Tests\Feature;

use App\Enums\DelayReportStatus;
use App\Models\Agent;
use App\Models\AgentDelayReport;
use App\Models\DelayReport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function check_requestForNewDelayReport() 
    { 
        $delayReport = DelayReport::factory()->create([
            'status' => DelayReportStatus::WAITING
        ]);

        $agent = Agent::factory()->create();

        $this->getJson(route('requestForNewDelayReport', $agent));
    
        $this->assertDatabaseHas('agent_delay_reports', [
            'agent_id' => $agent->id
        ]);

        $this->assertDatabaseHas('delay_reports', [
            'status' => DelayReportStatus::PROCESSING
        ]);
    }

    /** @test */
    public function check_requestForNewDelayReport_with_status_processing() 
    { 
        $delayReport = DelayReport::factory()->create([
            'status' => DelayReportStatus::PROCESSING
        ]);

        $agent = Agent::factory()->create();

        AgentDelayReport::factory()->create([
            'delay_report_id' => $delayReport->id,
            'agent_id' => $agent->id
        ]);

        $response = $this->getJson(route('requestForNewDelayReport', $agent));
    
        $response->assertJson([
            'status' => 'Failed',
        ]);
    }
}
