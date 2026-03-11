<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->numberBetween(1980, 2024),
            'genre' => $this->faker->word(),
            'country' => $this->faker->country(),
            'duration' => $this->faker->numberBetween(80, 180),
            'img_url' => $this->faker->imageUrl(640, 480, 'movies'),
        ];
    }
}