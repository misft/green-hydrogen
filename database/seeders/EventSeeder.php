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

        $random = random_int(0, 1);

        $event = Event::create([
            'event_category_id' => $category->id,
            'speaker_name' => $faker->name,
            'speaker_title' => $faker->title,
            'lat' => $faker->latitude,
            'lng' => $faker->longitude,
            'location' => $faker->address,
            'date' => $faker->date('Y-m-d'),
            'start_at' => $faker->time(),
            'end_at' => $faker->time(),
            'embed_type' => $random == 0 ? 'LINK' : 'FILE',
            'embed' => $random == 0 ? 'https://www.youtube.com/watch?v=Kp7eSUU9oy8' : 'image/image.png'
        ]);
        EventTranslation::create([
            'translation_id' => 1,
            'event_id' =>  $event->id,
            'title' => 'Lorem ipsum dolor',
            'description' => 'Lorem ipsum dolor sit amet. Lor en daime'
        ]);
    }
}
