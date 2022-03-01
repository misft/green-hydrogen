<?php

namespace Database\Seeders;

use App\Models\CompanyDirectoryTopic;
use App\Models\Region;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CompanyDirectoryBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Region::create([
            'name' => 'Jawa Tengah'
        ]);

        CompanyDirectoryTopic::create([
            'name' => $faker->company
        ]);
    }
}
