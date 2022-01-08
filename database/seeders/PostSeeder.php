<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'websiteId' => 1,
            'title' => Str::random(10),
            'description' => Str::random(255),
        ]);
    }
}
