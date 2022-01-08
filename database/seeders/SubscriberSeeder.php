<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
        ]);

        DB::table('website_subscriber')->insert([
            'websiteId' => 1,
            'subscriberId' => 1,
        ]);
    }
}
