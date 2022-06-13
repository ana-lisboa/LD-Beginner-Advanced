<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->domainWord(),
            'description' => $this->faker->paragraph(2),
            'started_at' => $this->faker->dateTimeBetween('-2years', '-1day'),
            'ended_at' => $this->faker->optional()->dateTimeBetween('-2years', '+1day')
        ];
    }
}
