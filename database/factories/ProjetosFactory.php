<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $days = [
            'Segunda',
            'Terça',
            'Quarta',
            'Quinta',
            'Sexta',
            'Sábado',
            'Domingo',
        ];

        $days = $this->faker->randomElement($days);

        return [
            //'image' => $this->faker->image(),
            'image' => '/imgs/doacao_de_comida.jpeg',
            'title' => $this->faker->title(),
            'phone' => $this->faker->phoneNumber(),
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
