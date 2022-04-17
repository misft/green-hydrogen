<?php

namespace Database\Seeders;

use App\Models\Spot;
use Illuminate\Database\Seeder;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ // 1
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'tagline',
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 2
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'tagline',
                'order' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 3
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'description',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 4
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'description',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 5
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'purpose',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 6
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'purpose',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 7
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'goto activity',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 8
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'goto activity',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 9
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'latest publication',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 10
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'latest publication',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 11
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'latest news',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 12
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'latest news',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 13
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'social media',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 14
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'social media',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 15
                'translation_id' => 1,
                'section_id' => 1,
                'name' => 'newsletter',
                'order' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 16
                'translation_id' => 2,
                'section_id' => 2,
                'name' => 'newsletter',
                'order' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Spot::insert($data);
    }
}
