<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::random(16),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'user_id' => mt_rand(0, 10),
            'desc' => $this->faker->sentence,
            'category_id' => mt_rand(0, 10),
        ];
    }
}
