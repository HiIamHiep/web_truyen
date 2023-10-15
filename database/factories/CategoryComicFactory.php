<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comic_id' => $this->faker->randomElement(Comic::query()->get('id')),
            'category_id' => $this->faker->randomElement(Category::query()->get('id')),
        ];
    }
}
