<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_id' => Album::all()->random()->id,
            'artist_id' => Artist::all()->random()->id,
            'title' => $this->faker->sentence(),
            'length' => rand(0,100),
            'track' => rand(0,100),
            'disc' => rand(0,100), 
            'lyrics' => $this->faker->sentence(),
            'mtime' => rand(0,100),
        ];
    }
}
