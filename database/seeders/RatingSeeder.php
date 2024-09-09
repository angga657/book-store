<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $books = \DB::table('books')->pluck('id');
        for ($i = 0; $i < 500000; $i++) {
            \DB::table('ratings')->insert([
                'book_id' => $faker->randomElement($books),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
