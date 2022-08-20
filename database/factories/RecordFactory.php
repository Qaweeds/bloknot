<?php

namespace Database\Factories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{

    protected $model = Record::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'people_id' => rand(1,10),
            'quantity' => rand(1,10),
            'price' => rand(20, 30) * 10,
            'created_at' =>$this->faker->dateTimeBetween('-30 days'),
        ];
    }
}
