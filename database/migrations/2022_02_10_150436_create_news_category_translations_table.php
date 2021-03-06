<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_category_id')->references('id')->on('news_categories')->cascadeOnDelete();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations')->nullOnDelete();
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
        Schema::dropIfExists('news_category_translations');
    }
}
