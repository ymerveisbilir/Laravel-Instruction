<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(25),
            'price' => rand(90,150),
            'category_id' => rand(1,5), //categories tablomdaki id aralığı 2 ,7 olduğu için.
            'user_id' => rand(1,2) //users tablomdaki id aralığı 1,2 olduğu için.
        ];
    }
}
