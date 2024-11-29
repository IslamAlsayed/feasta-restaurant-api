<?php

namespace Tests\Feature;

use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function it_fetches_all_recipes()
    {
        Stock::factory()->count(3)->create();

        $response = $this->getJson(route('recipes.index'));

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'result');
    }

    public function it_shows_a_recipe()
    {
        $stock = Stock::factory()->create();

        $response = $this->getJson(route('recipes.show', $stock->id));

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => $stock->toArray()]);
    }

    public function it_creates_a_recipe()
    {
        $data = Stock::factory()->make()->toArray();

        $response = $this->postJson(route('recipes.store'), $data);

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'success create stock']);

        $this->assertDatabaseHas('stocks', $data);
    }

    public function it_updates_a_recipe()
    {
        $stock = Stock::factory()->create();
        $updateData = Stock::factory()->make()->toArray();

        $response = $this->putJson(route('recipes.update', $stock->id), $updateData);

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'update stock success']);

        $this->assertDatabaseHas('stocks', $updateData);
    }

    public function it_deletes_a_recipe()
    {
        $stock = Stock::factory()->create();

        $response = $this->deleteJson(route('recipes.destroy', $stock->id));

        $response->assertStatus(200);
        $response->assertJson(['status' => 200, 'result' => 'delete stock success']);

        $this->assertDatabaseMissing('stocks', ['id' => $stock->id]);
    }
}
