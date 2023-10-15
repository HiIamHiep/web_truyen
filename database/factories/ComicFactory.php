<?php

namespace Database\Factories;

use App\Enums\ComicStatusEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
        $chapter_current = $this->faker->numberBetween(1, 100);
        return [
            'user_id' => $this->faker->randomElement(User::query()->get('id')),
            'name' => $name,
            'slug' => Str::slug($name),
            'status' => $this->faker->randomElement(ComicStatusEnum::getValues()),
            'content' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'thumb_url' => $this->faker->imageUrl(),
            'chapter_current' => $chapter_current,
            'chapter_total' => $this->faker->numberBetween(1, $chapter_current, -1 ),
            'is_recommended' => $this->faker->boolean ? 1 : 0,
            'view_total' => $this->faker->randomNumber(),
        ];
    }
}
