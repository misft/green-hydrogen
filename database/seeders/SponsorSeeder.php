<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use App\Models\SponsorGroup;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $group1 = SponsorGroup::create([
            'name' => 'Gold'
        ]);
        for ($i=0; $i < 5; $i++) { 
            Sponsor::create([
                'name' => $faker->company,
                'image' => '/sponsor/sponsor.png',
                'link' => 'https://google.com',
                'sponsor_group_id' => $group1->id 
            ]);
        }
        $group2 = SponsorGroup::create([
            'name' => 'Silver'
        ]);
        for ($i=0; $i < 5; $i++) { 
            Sponsor::create([
                'name' => $faker->company,
                'image' => '/sponsor/sponsor.png',
                'link' => 'https://google.com',
                'sponsor_group_id' => $group2->id 
            ]);
        }
        $group3 = SponsorGroup::create([
            'name' => 'Bronze'
        ]);
        for ($i=0; $i < 5; $i++) { 
            Sponsor::create([
                'name' => $faker->company,
                'image' => '/sponsor/sponsor.png',
                'link' => 'https://google.com',
                'sponsor_group_id' => $group3->id 
            ]);
        }
    }
}
