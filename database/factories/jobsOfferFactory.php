<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/*
 @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class jobsOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enterprise' =>$this->faker->realText($maxNbChars=200),
            'position' =>$this->faker->realText($maxNbChars=200),
            'state' => $this->faker->boolean,
        ];
    }
}
