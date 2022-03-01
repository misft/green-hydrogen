<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TranslationSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(CompanyDirectoryBaseSeeder::class);
    }
}
