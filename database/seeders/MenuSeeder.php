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

        $slots = Slot::all();
        $contentTypes = ContentType::all();
        $translations = Translation::all();

        foreach($slots as $index => $slot) {
            $menuHasSlot = MenuHasSlot::create([
                'menu_id' => $menu->id,
                'slot_id' => $slot->id,
                'order' => $index
            ]);

            $contentType = $contentTypes->random();

            $slotHasContent = SlotHasContent::create([
                'menu_has_slot_id' => $menuHasSlot->id,
                'content_type_id' => $contentType->id,
            ]);

            SlotHasContentTranslation::create([
                'slot_has_content_id' => $slotHasContent->id,
                'translation_id' => $translations->random()->id,
                'content' => null
            ]);
        }
    }
}
