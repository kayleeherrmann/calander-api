<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalendarEntry>
 */
class CalendarEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d');

        $user = $this->faker->randomElement(User::all());

        return [
            'title' => fake()->name(),
            'user_id' =>  $user->id,
            'category_id' => $this->faker->randomElement($user->categories),
            'start' => $date,
            'end'   => $date
        ];
    }
}
