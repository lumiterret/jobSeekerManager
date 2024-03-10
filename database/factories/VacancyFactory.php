<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    public function configure()
    {
        $this->faker = \Faker\Factory::create('ru_RU');
        return parent::configure();
    }

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

        $employer = Employer::all()->random();

        return [
            'title' => $this->faker->sentence(3),
            'description' => $description,
            'employer_id' => $employer->id,
            'user_id' => $employer->user_id,
            'created_at' => $this->faker->dateTimeBetween('-1month', 'now'),
        ];
    }
}
