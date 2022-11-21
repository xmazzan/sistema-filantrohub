<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projetos>
 */
class ProjetosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
        ];

        return [
            //'image' => $this->faker->image(),
            'title' => $this->faker->title(),
            'days' => $this->faker->days(),
            'postcode' => $this->faker->postcode(),
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'neighborhood' => $this->faker->words(nb: 2, asText: true),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->words(asText: true),
            'description' => $this->faker->words(asText: true),
        ];
    }
}
