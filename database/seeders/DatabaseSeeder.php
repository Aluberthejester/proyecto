<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Song;
use App\Models\Playlist;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Interaction;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(20)->create();
        Artist::factory(20)->create();
        Album::factory(20)->create();
        Song::factory(10)->has(Playlist::factory(20)->count(3))->create();
        
        Interaction::factory(20)->create();
    }
}
