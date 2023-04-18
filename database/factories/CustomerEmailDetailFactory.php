<?php

namespace Database\Factories;

use App\Models\CustomerEmailDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerEmailDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomerEmailDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email_id' => $this->faker->word,
        'customer_name' => $this->faker->word,
        'customer_company' => $this->faker->word,
        'customer_email' => $this->faker->word,
        'customer_phone' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
