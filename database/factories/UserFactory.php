<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = rand(1, 4);

        return [
            'name' => fake('FR_fr')->lastName(),
            'prenom' => fake('FR_fr')->firstName(),
            'type' => ($type==1?"Professeur":"Elève"),
            'adresse' => fake('FR_fr')->address(),
            'date_naissance' => fake()->date('Y-m-d'),
            'cp' => fake('FR_fr')->postcode(),
            'ville' => fake('FR_fr')->city(),
            'tel' => fake('FR_fr')->phoneNumber(),
            'email' => fake('FR_fr')->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
