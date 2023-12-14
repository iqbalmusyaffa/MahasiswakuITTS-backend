<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'companycategory_id' => rand(1, 4),
            'slug' => $this->faker->slug(),
            'status' => rand(0, 1),
            'location' => $this->faker->city(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'body' => $this->faker->paragraph(),
        ];
    }
}
