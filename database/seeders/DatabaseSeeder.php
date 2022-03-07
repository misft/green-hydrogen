<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TranslationSeeder::class);
        $this->call(CompanyDirectoryBaseSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(ContactSupportSeeder::class);
        $this->call(NewsSeeder::class);


        $this->call(SlotSeeder::class);
        $this->call(ContentTypeSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
