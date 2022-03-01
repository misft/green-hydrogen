<?php

namespace Database\Seeders;

use App\Models\ContentType;
use App\Models\Menu;
use App\Models\MenuGroup;
use App\Models\MenuGroupTranslation;
use App\Models\MenuHasSlot;
use App\Models\MenuTranslation;
use App\Models\Slot;
use App\Models\SlotHasContent;
use App\Models\SlotHasContentTranslation;
use App\Models\SlotHasContentType;
use App\Models\Translation;
use Carbon\Translator;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
    
        $group = MenuGroup::create();
        MenuGroupTranslation::create([
            'translation_id' => Translation::first()->id,
            'menu_group_id' => $group->id,
            'name' => $faker->name()
        ]);
        
        $menu = Menu::create([
            'menu_group_id' => $group->id
        ]);
        MenuTranslation::create([
            'translation_id' => Translation::first()->id,
            'menu_id' => $menu->id,
            'name' => $faker->name()
        ]);

        $contents = [
            'heading' => [
                'type' => 'title',
                'value' => 'Hello world!',
                'form' => 'text'
            ],
            'banner' => [
                'type' => 'image',
                'value' => '/storage/image/hello-world.png',
                'form' => 'image'
            ],
            'carousel' => [
                'type' => 'slideshow',
                'value' => [
                    '/storage/image/image1.png',
                    '/storage/image/image2.png',
                    '/storage/image/image3.png',
                ],
                'form' => 'image',
                'props' => [
                    'multiple' => 1
                ]
            ]
        ];

        for ($i=0; $i < 3; $i++) { 
            $slot = Slot::create([
                'name' => array_keys($contents)[$i]
            ]);
            $menuHasSlot = MenuHasSlot::create([
                'slot_id' => $slot->id,
                'menu_id' => $menu->id,
                'order' => $i
            ]);
            $content_type = ContentType::create([
                'name' => array_values($contents)[$i]["type"],
                'form' => array_values($contents)[$i]["form"],
                'props' => json_encode(@array_values($contents)[$i]["props"]),
            ]);
            $slotHasContent = SlotHasContent::create([
                'menu_has_slot_id' => $menuHasSlot->id,
                'content_type_id' => $content_type->id
            ]);
            SlotHasContentTranslation::create([
                'slot_has_content_id' => $slotHasContent->id,
                'translation_id' => Translation::first()->id,
                'content' => array_values($contents)[$i]["value"]
            ]);
        }
    }
}
