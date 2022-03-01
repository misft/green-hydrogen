<?php

namespace Database\Seeders\Base;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContentTypeSeeder::class);
        $this->call(TranslationSeeder::class);
    }
}
