<?php

namespace Database\Seeders\Base;

use App\Models\ContentType;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContentType::create([
            'name' => 'big_banner',
            'form' => 'image'   
        ]);
        ContentType::create([
            'name' => 'banner',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'header_title',
            'form' => 'text'   
        ]);
        ContentType::create([
            'name' => 'header_title',
            'form' => 'text'   
        ]);
        ContentType::create([
            'name' => 'header_background',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'header_image',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'header_background',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'content_image',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'content_description',
            'form' => 'textarea'
        ]);
        ContentType::create([
            'name' => 'content_background',
            'form' => 'image'
        ]);
        ContentType::create([
            'name' => 'section_embed',
            'form' => 'text'
        ]);
        ContentType::create([
            'name' => 'section_embed',
            'form' => 'text'
        ]);
        ContentType::create([
            'name' => 'slot:news' 
        ]);
        ContentType::create([
            'name' => 'slot:sponsor'
        ]);
           
    }
}
