<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logo' => 'favicon.png',
            'site_name' => 'feasta egyptian restaurant',
            'email' => 'info@feastaegyptianRestaurant.com',
            'phone' => '(+20) 1054258634',
            'address' => 'Palestine is free and independent',
            'work_hours' => 'every day from 10am to 8pm, sunday is closed',
            'about_us' => 'to achieve this, it would be necessary to have uniform grammar, pronunciation and more if a common words When, while the lovely valley teems with Tuesday Wednesday Thursday',
            'developer' => json_encode(['name' => 'IslamAlsayed', 'email' => 'eslamalsayed8133@gmail.com', 'phone' => '+201065488133']),
        ];
    }
}
