<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DelayReport>
 */
class DelayReportFactory extends Factory
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
            'order_id' => Order::factory()->create()->id,
            'status' => $this->faker->randomElement(["PROCESSING", "WAITING", "PROCESSED"])
        ];
    }
}
