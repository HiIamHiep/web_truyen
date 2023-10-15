<?php

namespace Database\Factories;

use App\Models\Comic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->word;

        return [
            'comic_id' => $this->faker->randomElement(Comic::query()->get('id')),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
