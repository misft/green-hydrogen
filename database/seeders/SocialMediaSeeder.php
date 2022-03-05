<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 4; $i++) { 
            SocialMedia::create([
                'name' => $faker->company,
                'value' => $faker->domainName,
                'logo' => 'social_media/image.png'
            ]);
        }
    }
}
