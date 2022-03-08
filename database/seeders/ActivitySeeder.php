<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\Translation;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 3; $i++) {
            $category = ActivityCategory::create(); 
            $category->translation()->create([
                'activity_category_id' => $category->id,
                'translation_id' => Translation::inRandomOrder()->first()->id,
                'name' => $faker->company
            ]);
            for ($j=0; $j < 3; $j++) { 
                $activity = Activity::create([
                    'activity_category_id' => $category->id,
                    'type' =>  $j % 2 == 0 ? 'FILE' : 'LINK',
                    'embed' => $j % 2 == 0 ? 'activity/image.png' : 'https://youtube.com'
                ]);

                $activity->translation()->create([
                    'activity_id' => $activity->id,
                    'translation_id' => Translation::inRandomOrder()->first()->id,
                    'title' => $faker->word,
                    'description' => $faker->word
                ]);
            }
        }
    }
}
