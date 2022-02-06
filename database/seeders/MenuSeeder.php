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

        for ($i=0; $i < 5; $i++) { 
            $slot = Slot::create([
                'name' => $faker->name()
            ]);
            $menu_has_slot = MenuHasSlot::create([
                'slot_id' => $slot->id,
                'menu_id' => $menu->id,
                'order' => $i
            ]);
            $content_type = ContentType::create([
                'name' => $faker->name()
            ]);
            $slot_has_content = SlotHasContent::create([
                'menu_has_slot_id' => $menu_has_slot->id,
                'content_type_id' => $content_type->id
            ]);
            SlotHasContentTranslation::create([
                'slot_has_content_id' => $slot_has_content->id,
                'translation_id' => Translation::first()->id,
                'content' => json_encode([
                    'title' => $faker->title,
                    'description' => $faker->words(),
                    'image' => $faker->imageUrl()
                ])
            ]);
        }
    }
}
