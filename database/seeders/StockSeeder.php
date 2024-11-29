<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Stock::truncate();
        Schema::enableForeignKeyConstraints();

        $names = [
            'Classic Margherita Pizza',
            'Vegetarian Stir-Fry',
            'Chocolate Chip Cookies',
            'Chicken Alfredo Pasta',
            'Mango Salsa Chicken',
            'Quinoa Salad with Avocado',
            'Tomato Basil Bruschetta',
            'Beef and Broccoli Stir-Fry',
            'Caprese Salad',
            'Shrimp Scampi Pasta',
            'Chicken Biryani',
            'Chicken Karahi',
            'Aloo Keema',
            'Chapli Kebabs',
            'Saag with Makki',
            'Japanese Ramen Soup',
            'Moroccan Chickpea Tagine',
            'Korean Bibimbap',
            'Greek Moussaka',
            'Butter Chicken (Murgh Makhani)',
            'Thai Green Curry',
            'Mango Lassi',
            'Italian Tiramisu',
            'Turkish Kebabs',
            'Blueberry Banana Smoothie',
            'Mexican Street Corn (Elote)',
            'Russian Borscht',
            'South Indian Masala Dosa',
            'Lebanese Falafel Wrap',
            'Brazilian Caipirinha',
        ];

        $items = [
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'carrot',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'tomato',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'lettuce',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'cucumber',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'potato',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'broccoli',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'onion',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'pepper',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'okra',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'celery',
            ],
            [
                'category' => fake()->randomElement(['vegetable', 'non-vegetable']),
                'type' => 'food',
                'title' => 'oatmeal',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'apple',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'banana',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'orange',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'strawberry',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'grape',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'blueberry',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'watermelon',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'apricot',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'orange',
            ],
            [
                'category' => 'fruits',
                'type' => 'food',
                'title' => 'pear',
            ],
            [
                'category' => 'meat',
                'type' => 'food',
                'title' => 'beef',
            ],
            [
                'category' => 'meat',
                'type' => 'food',
                'title' => 'chicken',
            ],
            [
                'category' => 'meat',
                'type' => 'food',
                'title' => 'pork',
            ],
            [
                'category' => 'meat',
                'type' => 'food',
                'title' => 'lamb',
            ],
            [
                'category' => 'fish',
                'type' => 'food',
                'title' => 'salmon',
            ],
            [
                'category' => 'fish',
                'type' => 'food',
                'title' => 'tuna',
            ],
            [
                'category' => 'fish',
                'type' => 'food',
                'title' => 'cod',
            ],
            [
                'category' => 'fish',
                'type' => 'food',
                'title' => 'sardine',
            ],
            [
                'category' => 'milks',
                'type' => 'food',
                'title' => 'milk',
            ],
            [
                'category' => 'milks',
                'type' => 'food',
                'title' => 'cheese',
            ],
            [
                'category' => 'milks',
                'type' => 'food',
                'title' => 'butter',
            ],
            [
                'category' => 'milks',
                'type' => 'food',
                'title' => 'yogurt',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Egyptian Rice',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Basmati Rice',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'White Rice',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Brown Rice',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Whole Grain Rice',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Wheat',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Corn',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Sweet Corn',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Regular Corn',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Barley',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Oatmeal',
            ],
            [
                'category' => 'cereals',
                'type' => 'food',
                'title' => 'Pasta',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'white bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'whole white bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'multigrain bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'oat bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'cinnamon bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'gaghiri bread',
            ],
            [
                'category' => 'bread',
                'type' => 'food',
                'title' => 'baguette bread',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'pain au vin',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'croissant',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'baklava',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'pancakes',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'biscuits',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'cakes',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'donuts',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'pizza',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'brioche',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'vanilla cake',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'chocolate cake',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'almond cake',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'raisin cake',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'gingerbread cake',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'chocolate biscuits',
            ],
            [
                'category' => 'pastries',
                'type' => 'food',
                'title' => 'butter biscuits',
            ],
            [
                'category' => 'raw_materials',
                'type' => 'food',
                'title' => 'Wheat flour',
            ],
            [
                'category' => 'raw_materials',
                'type' => 'food',
                'title' => 'Wheat flour',
            ],
            [
                'category' => 'raw_materials',
                'type' => 'food',
                'title' => 'Barley flour',
            ],
            [
                'category' => 'raw_materials',
                'type' => 'food',
                'title' => 'Oatmeal flour',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'black tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'green tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'peppermint tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'ginger tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'lemon tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'herbal tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'anise tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'thyme tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'rose tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'fennel tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'saffron tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'cardamom tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'turmeric tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'cinnamon tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'green tea tatte',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'jasmine tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'milk tea',
            ],
            [
                'category' => 'tea',
                'type' => 'drink',
                'title' => 'vanilla tea',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'turkish coffee',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'arabic coffee',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'espresso',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'americano',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'cappuccino',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'latte',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'mocha',
            ],
            [
                'category' => 'coffee',
                'type' => 'drink',
                'title' => 'french press',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'fresh milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'full Cream milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'low fat milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'skimmed milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'flavored milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'condensed milk',
            ],
            [
                'category' => 'milk',
                'type' => 'drink',
                'title' => 'evaporated milk',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'orange juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'apple juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'grape juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'pineapple juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'mango juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'pomegranate juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'watermelon juice',
            ],
            [
                'category' => 'power_drinks',
                'type' => 'drink',
                'title' => 'carrot juice',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'red bull',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'monster',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'rockstar',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'mountain dew',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'gatorade',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'powerade',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'arizona iced tea',
            ],
            [
                'category' => 'sweet_drinks',
                'type' => 'drink',
                'title' => 'snapple',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'coca cola',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'pepsi',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'sprite',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'fanta',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'mountain dew',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => '7UP',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'miranda',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'red bull',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'monster energy',
            ],
            [
                'category' => 'soft_drinks',
                'type' => 'drink',
                'title' => 'rockstar',
            ]
        ];

        $ingredients = [
            [
                'Pizza dough',
                'Tomato sauce',
                'Fresh mozzarella cheese',
                'Fresh basil leaves',
                'Olive oil',
                'Salt and pepper to taste'
            ],
            [
                'Tofu, cubed',
                'Broccoli florets',
                'Carrots, sliced',
                'Bell peppers, sliced',
                'Soy sauce',
                'Ginger, minced',
                'Garlic, minced',
                'Sesame oil',
                'Cooked rice for serving'
            ],
            [
                'All-purpose flour',
                'Butter, softened',
                'Brown sugar',
                'White sugar',
                'Eggs',
                'Vanilla extract',
                'Baking soda',
                'Salt',
                'Chocolate chips'
            ],
            [
                'Fettuccine pasta',
                'Chicken breast, sliced',
                'Heavy cream',
                'Parmesan cheese, grated',
                'Garlic, minced',
                'Butter',
                'Salt and pepper to taste',
                'Fresh parsley for garnish'
            ],
            [
                'Chicken thighs',
                'Mango, diced',
                'Red onion, finely chopped',
                'Cilantro, chopped',
                'Lime juice',
                'Jalapeño, minced',
                'Salt and pepper to taste',
                'Cooked rice for serving'
            ],
            [
                'Quinoa, cooked',
                'Avocado, diced',
                'Cherry tomatoes, halved',
                'Cucumber, diced',
                'Red bell pepper, diced',
                'Feta cheese, crumbled',
                'Lemon vinaigrette dressing',
                'Salt and pepper to taste'
            ],
            [
                'Baguette, sliced',
                'Tomatoes, diced',
                'Fresh basil, chopped',
                'Garlic cloves, minced',
                'Balsamic glaze',
                'Olive oil',
                'Salt and pepper to taste'
            ],
            [
                'Beef sirloin, thinly sliced',
                'Broccoli florets',
                'Soy sauce',
                'Oyster sauce',
                'Sesame oil',
                'Garlic, minced',
                'Ginger, minced',
                'Cornstarch',
                'Cooked white rice for serving'
            ],
            [
                'Tomatoes, sliced',
                'Fresh mozzarella cheese, sliced',
                'Fresh basil leaves',
                'Balsamic glaze',
                'Extra virgin olive oil',
                'Salt and pepper to taste'
            ],
            [
                'Basmati rice',
                'Chicken, cut into pieces',
                'Onions, thinly sliced',
                'Tomatoes, chopped',
                'Yogurt',
                'Ginger-garlic paste',
                'Biryani masala',
                'Green chilies, sliced',
                'Fresh coriander leaves',
                'Mint leaves',
                'Ghee',
                'Salt to taste'
            ],
            [
                'Basmati rice',
                'Chicken, cut into pieces',
                'Onions, thinly sliced',
                'Tomatoes, chopped',
                'Yogurt',
                'Ginger-garlic paste',
                'Biryani masala',
                'Green chilies, sliced',
                'Fresh coriander leaves',
                'Mint leaves',
                'Ghee',
                'Salt to taste'
            ],
            [
                'Chicken, cut into pieces',
                'Tomatoes, chopped',
                'Green chilies, sliced',
                'Ginger, julienned',
                'Garlic, minced',
                'Coriander powder',
                'Cumin powder',
                'Red chili powder',
                'Garam masala',
                'Cooking oil',
                'Fresh coriander leaves',
                'Salt to taste'
            ],
            [
                'Ground beef',
                'Potatoes, peeled and diced',
                'Onions, finely chopped',
                'Tomatoes, chopped',
                'Ginger-garlic paste',
                'Cumin powder',
                'Coriander powder',
                'Turmeric powder',
                'Red chili powder',
                'Cooking oil',
                'Fresh coriander leaves',
                'Salt to taste'
            ],
            [
                'Ground beef',
                'Onions, finely chopped',
                'Tomatoes, finely chopped',
                'Green chilies, chopped',
                'Coriander leaves, chopped',
                'Pomegranate seeds',
                'Ginger-garlic paste',
                'Cumin powder',
                'Coriander powder',
                'Red chili powder',
                'Egg',
                'Cooking oil',
                'Salt to taste'
            ],
            [
                'Mustard greens, washed and chopped',
                'Spinach, washed and chopped',
                'Cornmeal (makki ka atta)',
                'Onions, finely chopped',
                'Green chilies, chopped',
                'Ginger, grated',
                'Ghee',
                'Salt to taste'
            ],
            [
                'Ramen noodles',
                'Chicken broth',
                'Soy sauce',
                'Mirin',
                'Sesame oil',
                'Shiitake mushrooms, sliced',
                'Bok choy, chopped',
                'Green onions, sliced',
                'Soft-boiled eggs',
                'Grilled chicken slices',
                'Norwegian seaweed (nori)'
            ],
            [
                'Chickpeas, cooked',
                'Tomatoes, chopped',
                'Carrots, diced',
                'Onions, finely chopped',
                'Garlic, minced',
                'Cumin',
                'Coriander',
                'Cinnamon',
                'Paprika',
                'Vegetable broth',
                'Olives',
                'Fresh cilantro, chopped'
            ],
            [
                'Cooked white rice',
                'Beef bulgogi (marinated and grilled beef slices)',
                'Carrots, julienned and sautéed',
                'Spinach, blanched and seasoned',
                'Zucchini, sliced and grilled',
                'Bean sprouts, blanched',
                'Fried egg',
                'Gochujang (Korean red pepper paste)',
                'Sesame oil',
                'Toasted sesame seeds'
            ],
            [
                'Eggplants, sliced',
                'Ground lamb or beef',
                'Onions, finely chopped',
                'Garlic, minced',
                'Tomatoes, crushed',
                'Red wine',
                'Cinnamon',
                'Allspice',
                'Nutmeg',
                'Olive oil',
                'Milk',
                'Flour',
                'Parmesan cheese',
                'Egg yolks'
            ],
            [
                'Chicken thighs, boneless and skinless',
                'Yogurt',
                'Ginger-garlic paste',
                'Garam masala',
                'Kashmiri red chili powder',
                'Tomato puree',
                'Butter',
                'Heavy cream',
                'Kasuri methi (dried fenugreek leaves)',
                'Sugar',
                'Salt to taste'
            ],
            [
                'Chicken thighs, boneless and skinless',
                'Green curry paste',
                'Coconut milk',
                'Fish sauce',
                'Sugar',
                'Eggplant, sliced',
                'Bell peppers, sliced',
                'Basil leaves',
                'Jasmine rice for serving'
            ],
            [
                'Ripe mango, peeled and diced',
                'Yogurt',
                'Milk',
                'Honey',
                'Cardamom powder',
                'Ice cubes'
            ],
            [
                'Espresso, brewed and cooled',
                'Ladyfinger cookies',
                'Mascarpone cheese',
                'Heavy cream',
                'Sugar',
                'Cocoa powder'
            ],
            [
                'Ground lamb or beef',
                'Onions, grated',
                'Garlic, minced',
                'Parsley, finely chopped',
                'Cumin',
                'Coriander',
                'Red pepper flakes',
                'Salt and pepper to taste',
                'Flatbread for serving',
                'Tahini sauce'
            ],
            [
                'Blueberries, fresh or frozen',
                'Banana, peeled and sliced',
                'Greek yogurt',
                'Almond milk',
                'Honey',
                'Chia seeds (optional)'
            ],
            [
                'Corn on the cob',
                'Mayonnaise',
                'Cotija cheese, crumbled',
                'Chili powder',
                'Lime wedges'
            ],
            [
                'Beets, peeled and shredded',
                'Cabbage, shredded',
                'Potatoes, diced',
                'Onions, finely chopped',
                'Carrots, grated',
                'Tomato paste',
                'Beef or vegetable broth',
                'Garlic, minced',
                'Bay leaves',
                'Sour cream for serving'
            ],
            [
                'Dosa batter (fermented rice and urad dal batter)',
                'Potatoes, boiled and mashed',
                'Onions, finely chopped',
                'Mustard seeds',
                'Cumin seeds',
                'Curry leaves',
                'Turmeric powder',
                'Green chilies, chopped',
                'Ghee',
                'Coconut chutney for serving'
            ],
            [
                'Falafel balls',
                'Whole wheat or regular wraps',
                'Tomatoes, diced',
                'Cucumbers, sliced',
                'Red onions, thinly sliced',
                'Lettuce, shredded',
                'Tahini sauce',
                'Fresh parsley, chopped'
            ],
            [
                'Cachaça (Brazilian sugarcane spirit)',
                'Lime, cut into wedges',
                'Granulated sugar',
                'Ice cubes'
            ]
        ];

        foreach ($items as $item) {
            $start_date = fake()->dateTimeThisYear();
            $end_date = (clone $start_date)->modify('+' . rand(7, 180) . ' days');

            $buying_price = fake()->randomFloat(2, 0.5, 99.99);
            $selling_price = $buying_price + 2;

            Stock::create([
                'name' => $names[rand(1, 29)],
                'amount' => 70,
                'type' => $item['type'],
                'category' => $item['category'],
                'title' => $item['title'],
                'start_date' => $start_date->format('Y-m-d H:i:s'),
                'end_date' => $end_date->format('Y-m-d H:i:s'),
                'buying_price' => $buying_price,
                'selling_price' => $selling_price,
                'vat' => rand(1, 25),
                'cookTime' => rand(1, 45),
                'difficulty' => fake()->randomElement(['easy', 'medium', 'hard']),
                'cooking' => fake()->randomElement(['Italian', 'Asian', 'American', 'Mexican', 'Mediterranean', 'Pakistani', 'Japanese', 'Moroccan', 'Korean', 'Indian', 'Greek', 'Thai', 'Turkish', 'Smoothie', 'Russian', 'Lebanese', 'Brazilian']),
                'calories' => rand(1, 200),
                'mealType' => fake()->randomElement(['breakfast', 'lunch', 'dinner', 'dessert']),
                'ingredients' => json_encode($ingredients[rand(1, 29)]),
                'description' => fake()->sentence(rand(7, 50)),
            ]);
        }
    }
}
