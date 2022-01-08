<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websites')->insert([
            'name' => 'inisev',
            'url' => 'https://inisev.com',
        ]);
    }
}
