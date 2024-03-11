<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $description = PHP_EOL . $this->faker->sentence(3) . PHP_EOL;
        for($i = 0; $i <=3; $i++ ) {
            $description .= PHP_EOL . $this->faker->paragraph(random_int(2, 6)) . PHP_EOL;
        }
        return [
            'title' => $this->faker->sentence(3),
            'description' => $description,
            'user_id' => User::all()->random()->id,
        ];
    }
}
