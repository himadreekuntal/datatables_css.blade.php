<?php

namespace Database\Factories;

use App\Models\TaxDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tax_id' => $this->faker->word,
        'name' => $this->faker->word,
        'amount' => $this->faker->word,
        'tax_percentage' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
