<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsCategoryTranslation;
use App\Models\Translation;
use Faker\Factory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        if(NewsCategory::all()->isEmpty()) {
            $category = NewsCategory::create();
            NewsCategoryTranslation::create([
                'translation_id' => Translation::first()->id,
                'name' => $faker->colorName
            ]);
        } else {
            $category = NewsCategory::first();
        }

        $i = 0;
        while ($i <= 3) {
            $i++;
            $news = News::create([
                'news_category_id' => $category->id,
                'embed' => json_encode('storage/embed/embed.png')
            ]);
            $news->translation()->create([
                'translation_id' => Translation::first()->id,
                'title' => $faker->name(),
                'description' => $faker->name()
            ]);
        }
    }
}
