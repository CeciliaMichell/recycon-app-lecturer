<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'product_id' => $this->faker->uuid(),
            'name' => $this->faker->text(20),
            'price' => $this->faker->numberBetween('10000','1000000'),
            'description' => $this->faker->text(200),
            'image' => 'storage/images/1.jpg',
            'category_id' => $this->faker->numberBetween('1','2')
        ];
    }
}
