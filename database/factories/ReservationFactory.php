<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();

        return [
            'email' => fake()->email(),
            'number_of_people' => fake()->numberBetween(1, 10),
            'date' => fake()->date(),
            'time' => fake()->randomElement(['1', '2', '3', '4']),
            'phone' => fake()->e164PhoneNumber(),
            'status' => 'pending',
            'client_id' => $client->id,
        ];
    }
}
