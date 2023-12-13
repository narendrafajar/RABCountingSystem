<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasok>
 */
class PemasokFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Pemasok::class;
    public function definition(): array
    {
        $randomCode = strtoupper($this->faker->randomLetter . $this->faker->randomLetter . $this->faker->randomNumber(6));
        $formattedCode = substr_replace($randomCode, '-', 3, 0); // Example: AB-123

        return [
            'kode' => $formattedCode,
            'nama' => $this->faker->company,
            'alamat' => $this->faker->address,
            // Add other randomly generated attributes
        ];
    }
}
