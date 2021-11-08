<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{

    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ville = $this->faker->city;
        $pays = $this->faker->country;

        return [
            "nom" => $this->faker->lastName,
            "prenom" => $this->faker->firstName,
            "sexe" => array_rand(["F", "H"], 1),
            "dateNaissance" => $this->faker->dateTimeBetween("1960-01-01", "2004-12-30"),
            "lieuNaissance" =>  "$pays, $ville",
            "nationalite" => $this->faker->country,
            "pays" => $pays,
            "ville" => $ville,
            "adresse" => $this->faker->address,
            "telephone1" => $this->faker->phoneNumber,
            "telephone2" => $this->faker->phoneNumber,
            "pieceIdentite" => array_rand(["CNI", "PASSPORT", "PERMIS DE CONDUIRE"], 1),
            "noPieceIdentite" => $this->faker->creditCardNumber,
        ];
    }
}
