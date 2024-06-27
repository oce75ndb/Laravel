<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $coursIdArray = Cour::pluck('id')->toArray();
        $coursId = $coursIdArray[array_rand($coursIdArray)];

        $userIdArray = User::where('type',"Eleve")->pluck('id')->toArray();
        $userId = $userIdArray[array_rand($userIdArray)];

        return [
            //
        ];
    }
}
