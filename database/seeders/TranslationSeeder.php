<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Translation::create([
            'code'=>'id-ID',
            'name' => 'Indonesia'
        ]);
        Translation::create([
            'code'=>'en-US',
            'name' => 'US'
        ]);
    }
}
