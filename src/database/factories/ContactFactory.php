<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    return [
        'last_name' => $this->faker->lastName,
        'first_name' => $this->faker->firstName,
        'gender' => $this->faker->randomElement(['男性', '女性', 'その他']),
        'email' => $this->faker->unique()->safeEmail,
        'phone' => $this->faker->numerify('0##########'),
        'address' => $this->faker->address,
        'building' => $this->faker->optional()->secondaryAddress,
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        'content' => $this->faker->text(100),
    ];
    }
}
