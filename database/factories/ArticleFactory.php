<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" => $this->fake->lastName,
            "noSerie" => $this->fake->swiftBicNumber,
            "imageUrl" => $this->faker->imageUrl(),
            "type_article_id" => rand(1, 4),
            "estDisponible" => rand(0, 1),
        ];
    }
}
