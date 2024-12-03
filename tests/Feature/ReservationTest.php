<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function it_fetches_all_reservations()
    {
        Reservation::factory()->count(3)->create();

        $response = $this->getJson(route('reservations.index'));

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'result');
    }

    public function it_shows_a_reservation()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->getJson(route('reservations.show', $reservation->id));

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => $reservation->toArray()]);
    }

    public function it_creates_a_reservation()
    {
        $client = Client::factory()->create();

        $reservationData = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'capacity' => rand(1, 10),
            'date' => fake()->dateTimeThisYear()->format('Y-m-d H:i:s'),
            'time' => fake()->randomElement(['1', '2', '3']),
            'phone' => fake()->e164PhoneNumber(),
            'status' => 'pending',
            'client_id' => $client->id,
        ];

        $response = $this->postJson(route('reservations.store'), $reservationData);

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'success create reservation']);

        $this->assertDatabaseHas('reservations', $reservationData);
    }


    public function it_updates_a_reservation()
    {
        $reservation = Reservation::factory()->create();
        $client = Client::factory()->create();

        $newData = [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'capacity' => rand(1, 10),
            'date' => fake()->dateTimeThisYear()->format('Y-m-d H:i:s'),
            'time' => fake()->randomElement(['1', '2', '3']),
            'phone' => fake()->e164PhoneNumber(),
            'status' => 'pending',
            'client_id' => $client->id,
        ];

        $response = $this->putJson(route('reservations.update', $reservation->id), $newData);

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'update reservation success']);

        $this->assertDatabaseHas('reservations', $newData);
    }

    public function it_deletes_a_reservation()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->deleteJson(route('reservations.destroy', $reservation->id));

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'delete reservation success']);

        $this->assertDatabaseMissing('reservations', ['id' => $reservation->id]);
    }
}
