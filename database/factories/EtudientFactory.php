<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use App\Models\Ville;

class EtudientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            // 'email' => $this->faker->email,
            'date_de_naissance' => $this->faker->date,
            // 'ville_id' => Ville::inRandomOrder()->first()->id
             'ville_id' => Ville::factory(),
            'user_id' => User::factory(),
        ];
    }
}

