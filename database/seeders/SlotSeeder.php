<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slot::create([
            'name' => 'heading'
        ]);
        Slot::create([
            'name' => 'banner'
        ]);
        Slot::create([
            'name' => 'big_banner'
        ]);
        Slot::create([
            'name' => 'content_section'
        ]);
    }
}
