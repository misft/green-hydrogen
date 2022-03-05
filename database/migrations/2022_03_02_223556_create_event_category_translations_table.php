<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations');
            $table->foreignId('event_category_id')->nullable()->references('id')->on('event_categories');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_category_translations');
    }
}
