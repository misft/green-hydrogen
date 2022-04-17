<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
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
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'left',
                'order' => 0,
                'content' => 'HIDROGEN HIJAU',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 2
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'left',
                'order' => 0,
                'content' => 'GREEN HYDROGEN',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 3
                'translation_id' => 1,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'left',
                'order' => 1,
                'content' => 'ADALAH MASA DEPAN KITA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 4
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'left',
                'order' => 1,
                'content' => 'IS OUR FUTURE',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 5
                'translation_id' => 1,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'left',
                'order' => 2,
                'content' => '05 Januari - 13 Januari Hall Conference, Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 6
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'left',
                'order' => 2,
                'content' => '05 Januari - 13 Januari Hall Conference, Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 7
                'translation_id' => 1,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'right',
                'order' => 0,
                'content' => 'BERGABUNG DENGAN KAMI',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 8
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'right',
                'order' => 0,
                'content' => 'JOIN OUR',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 9
                'translation_id' => 1,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'right',
                'order' => 1,
                'content' => 'DAMPAK KOMUNITAS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 10
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'right',
                'order' => 1,
                'content' => 'IMPACT COMMUNITIES',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 11
                'translation_id' => 1,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'right',
                'order' => 2,
                'content' => 'Jaringan global kami yang terdiri dari hampir 100 Komite Anggota nasional menghubungkan para pemimpin energi, industri, pemerintah, inovator, dan pakar di seluruh dunia.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 12
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'right',
                'order' => 2,
                'content' => 'Our impartial global network of nearly 100 national Member Committees connects energy leaders, industries, governments, innovators and experts across the world.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 13
                'translation_id' => 2,
                'spot_id' => 1,
                'types' => 'text',
                'positions' => 'right',
                'order' => 3,
                'content' => 'TEMUKAN LEBIH BANYAK LAGI',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 13
                'translation_id' => 2,
                'spot_id' => 2,
                'types' => 'text',
                'positions' => 'right',
                'order' => 3,
                'content' => 'FIND OUT MORE',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];



        Content::insert($data);
    }
}
