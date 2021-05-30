<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->streetName(),
            'description' => $this->faker->realTextBetween(200, 500, 2),
            'price' => $this->faker->numberBetween(1000,5000),
            'product_category_id' => $this->faker->numberBetween(1,4),
            'created_at' => now(),
        ];
    }
}
