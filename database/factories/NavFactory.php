<?php

namespace Database\Factories;

use App\Models\Nav;
use Illuminate\Database\Eloquent\Factories\Factory;

class NavFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nav::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => mt_rand(1,2),
            'parent_id' => mt_rand(1,5)
        ];
    }
}
