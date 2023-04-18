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
            'product' => $this->faker->word,
        'category_id' => $this->faker->word,
        'brand_id' => $this->faker->word,
        'image' => $this->faker->word,
        'catalog' => $this->faker->word,
        'qty' => $this->faker->word,
        'warranty' => $this->faker->word,
        'buying_price' => $this->faker->word,
        'selling_price' => $this->faker->word,
        'status' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
