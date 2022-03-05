<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventCategoryTranslation;
use App\Models\EventTranslation;
use Faker\Factory;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $category = EventCategory::create();
        EventCategoryTranslation::create([
            'name' => $faker->company,
            'event_category_id' => $category->id
        ]);

        $event = Event::create([
            'event_category_id' => $category->id,
            'speaker_name' => $faker->name,
            'speaker_title' => $faker->title,
            'lat' => $faker->latitude,
            'lng' => $faker->longitude,
            'location' => $faker->address
        ]);
        EventTranslation::create([
            'translation_id' => 1,
            'event_id' =>  $event->id,
            'title' => 'Lorem ipsum dolor',
            'description' => 'Lorem ipsum dolor sit amet. Lor en daime'
        ]);
    }
}
