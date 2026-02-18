<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $filmIds = DB::table('films')->pluck('id');
        $actorIds = DB::table('actors')->pluck('id');

        foreach ($filmIds as $filmId) {
            $actorsForFilm = $actorIds->random(rand(1, 3));

            foreach ($actorsForFilm as $actorId) {
                DB::table('films_actors')->insert([
                    'film_id' => $filmId,
                    'actor_id' => $actorId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
