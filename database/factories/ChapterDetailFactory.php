<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChapterDetailFactory extends Factory
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
            'chapter_id' => $this->faker->randomElement(Chapter::query()->get('id')),
            'name' => $name,
            'slug' => Str::slug($name),
            'storage_image' => $this->faker->imageUrl(),
        ];
    }
}
