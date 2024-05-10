<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\DelayReport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgentDeliveryReport>
 */
class AgentDelayReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'agent_id' => Agent::factory()->create()->id,
            'delay_report_id' => DelayReport::factory()->create()->id,
        ];
    }
}
