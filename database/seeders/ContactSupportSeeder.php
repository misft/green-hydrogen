<?php

namespace Database\Seeders;

use App\Models\ContactSupport;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContactSupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        ContactSupport::create([
            'name' => $faker->company,
            'value' => $faker->phoneNumber,
            'logo' => 'contact_support/image.png'
        ]);
    }
}
