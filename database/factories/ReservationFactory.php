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
        // $client = Client::inRandomOrder()->first() ?? Client::factory()->create();
        $client = Client::find(1) ?? Client::factory()->create();

        return [
            'name' => $client->name,
            'email' => $client->email,
            'capacity' => fake()->numberBetween(1, 10),
            'date' => fake()->date(),
            'time' => fake()->randomElement(['1', '2', '3']),
            'phone' => $client->phone,
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
            'client_id' => $client->id,
        ];
    }
}
