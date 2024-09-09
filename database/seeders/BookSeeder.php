<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        $authors = \DB::table('authors')->pluck('id');
        $categories = \DB::table('categories')->pluck('id');
        for ($i = 0; $i < 100000; $i++) {
            \DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author_id' => $faker->randomElement($authors),
                'category_id' => $faker->randomElement($categories),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
