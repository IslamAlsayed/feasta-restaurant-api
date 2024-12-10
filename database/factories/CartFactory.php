<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $menu1 = Menu::inRandomOrder()->first() ?? Menu::factory()->create();
        $menu2 = Menu::inRandomOrder()->first() ?? Menu::factory()->create();
        $menu3 = Menu::inRandomOrder()->first() ?? Menu::factory()->create();

        $items = [
            ['id' => $menu1->id, 'title' => $menu1->title, 'image' => '15.webp', 'price' => $menu1->price, 'quantity' => 1, 'vat' => $menu1->vat],
            ['id' => $menu2->id, 'title' => $menu2->title, 'image' => '7.webp', 'price' => $menu2->price, 'quantity' => 1, 'vat' => $menu2->vat],
            ['id' => $menu3->id, 'title' => $menu3->title, 'image' => '22.webp', 'price' => $menu3->price, 'quantity' => 1, 'vat' => $menu3->vat]
        ];

        $total = 0;

        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'] + ($item['price'] * $item['quantity'] * $item['vat'] / 100);
        }

        $client = Client::inRandomOrder()->first() ?? Client::factory()->create();

        return [
            'items' => json_encode($items),
            'total' => $total,
            'code' => strtoupper(substr(md5(uniqid()), 0, 10)),
            'client_id' => $client->id,
        ];
    }
}
