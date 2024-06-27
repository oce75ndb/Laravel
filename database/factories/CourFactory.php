<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cour>
 */
class CourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usersArray = User::where('type','Professeur')->pluck('id')->toArray();
        $user = $usersArray[array_rand($usersArray)];
        return [
            'nom' => fake('FR_fr')->title(),
            'professeur_id' => $user,
        ];
    }
}
