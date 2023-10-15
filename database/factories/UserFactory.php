<?php

namespace Database\Factories;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->boolean ? 0 : 1,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'avatar' => $this->faker->boolean ? $this->faker->imageUrl() : null,
            'role' => $this->faker->randomElement(UserRoleEnum::getValues()),
        ];
    }
}
