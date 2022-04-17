<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
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
                'name' => 'Beranda',
                'order' => 0,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 2
                'translation_id' => 2,
                'name' => 'Home',
                'order' => 0,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 3
                'translation_id' => 1,
                'name' => 'Hidrogen Hijau',
                'order' => 1,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 4
                'translation_id' => 2,
                'name' => 'Green Hydrogen',
                'order' => 1,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 5
                'translation_id' => 1,
                'name' => 'Direktori Perusahaan',
                'order' => 2,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 6
                'translation_id' => 2,
                'name' => 'Company Directories',
                'order' => 2,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 7
                'translation_id' => 1,
                'name' => 'Publikasi',
                'order' => 3,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 8
                'translation_id' => 2,
                'name' => 'Publications',
                'order' => 3,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 9
                'translation_id' => 1,
                'name' => 'Berita & Acara',
                'order' => 4,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 10
                'translation_id' => 2,
                'name' => 'News & Event',
                'order' => 4,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 11
                'translation_id' => 1,
                'name' => 'Tentang Kami',
                'order' => 5,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 12
                'translation_id' => 2,
                'name' => 'About Us',
                'order' => 5,
                'parent' => 0,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 13
                'translation_id' => 1,
                'name' => 'Ringkasan',
                'order' => 0,
                'parent' => 3,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 14
                'translation_id' => 2,
                'name' => 'Overview',
                'order' => 0,
                'parent' => 4,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 15
                'translation_id' => 1,
                'name' => 'Produksi Hidrogen Hijau',
                'order' => 1,
                'parent' => 3,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 16
                'translation_id' => 2,
                'name' => 'Green Hydrogen Production',
                'order' => 1,
                'parent' => 4,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 17
                'translation_id' => 1,
                'name' => 'Produksi Hidrogen Hijau',
                'order' => 2,
                'parent' => 3,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 18
                'translation_id' => 2,
                'name' => 'Green Hydrogen Production',
                'order' => 2,
                'parent' => 4,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 19
                'translation_id' => 1,
                'name' => 'Hidrogen Hijau Di Indonesia',
                'order' => 3,
                'parent' => 3,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 20
                'translation_id' => 2,
                'name' => 'Green Hydrogen In Indonesia',
                'order' => 3,
                'parent' => 4,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 21
                'translation_id' => 1,
                'name' => 'Gambaran Umum Hidrogen Hijau Di Indonesia',
                'order' => 0,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 22
                'translation_id' => 2,
                'name' => 'Overview Green Hydrogen In Indonesia',
                'order' => 0,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 23
                'translation_id' => 1,
                'name' => 'Potensi Hidrogen Hijau Indonesia',
                'order' => 1,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 24
                'translation_id' => 2,
                'name' => "Indonesia's Green Hydrogen Potential",
                'order' => 1,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 25
                'translation_id' => 1,
                'name' => 'Kerangka Hukum',
                'order' => 2,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 26
                'translation_id' => 2,
                'name' => "Legal Framework",
                'order' => 2,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 27
                'translation_id' => 1,
                'name' => 'Pemetaan Pemangku Kepentingan',
                'order' => 3,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 28
                'translation_id' => 2,
                'name' => "Stakeholder Mapping",
                'order' => 3,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 29
                'translation_id' => 1,
                'name' => 'Inisiasi & Aksi',
                'order' => 4,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 30
                'translation_id' => 2,
                'name' => "Initiation & Action",
                'order' => 4,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 31
                'translation_id' => 1,
                'name' => 'Kemajuan Pengembangan Hidrogen',
                'order' => 5,
                'parent' => 19,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 32
                'translation_id' => 2,
                'name' => "Hydrogen Development Progress",
                'order' => 5,
                'parent' => 20,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 33
                'translation_id' => 1,
                'name' => 'Berita',
                'order' => 0,
                'parent' => 9,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 34
                'translation_id' => 2,
                'name' => "News",
                'order' => 0,
                'parent' => 10,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 35
                'translation_id' => 1,
                'name' => 'Tender & Proyek Yang Sedang Berlangsung',
                'order' => 1,
                'parent' => 9,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 36
                'translation_id' => 2,
                'name' => "Ongoing Tender & Proyek",
                'order' => 1,
                'parent' => 10,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 37
                'translation_id' => 1,
                'name' => 'Acara',
                'order' => 2,
                'parent' => 9,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 38
                'translation_id' => 2,
                'name' => "Event",
                'order' => 2,
                'parent' => 10,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 39
                'translation_id' => 1,
                'name' => 'Pendahuluan & Tujuan',
                'order' => 0,
                'parent' => 11,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 40
                'translation_id' => 2,
                'name' => "Introduction & Objectives",
                'order' => 0,
                'parent' => 12,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 41
                'translation_id' => 1,
                'name' => 'Mitra Kami',
                'order' => 1,
                'parent' => 11,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 42
                'translation_id' => 2,
                'name' => "Our Partner",
                'order' => 1,
                'parent' => 12,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 43
                'translation_id' => 1,
                'name' => 'Kegiatan',
                'order' => 2,
                'parent' => 11,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 44
                'translation_id' => 2,
                'name' => "Activity",
                'order' => 2,
                'parent' => 12,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 45
                'translation_id' => 1,
                'name' => 'Hubungi Kami',
                'order' => 3,
                'parent' => 11,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [ // 46
                'translation_id' => 2,
                'name' => "Contact Us",
                'order' => 3,
                'parent' => 12,
                'link' => '#',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        
        Section::insert($data);
    }
}
