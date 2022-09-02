<?php

namespace Database\Factories;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => $this->faker->slug() ,
            'title' => $this->faker->realText(200),
            'excerpt' => $this->faker->realText(100),
            'body' => $this->faker->realText(1000) ,
            'image' => '/images/post/1650442612.jpg',
            'published_at' => now()
        ];
    }
}
