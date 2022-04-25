<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations')->nullOnDelete();
            $table->foreignId('project_category_id')->nullable()->references('id')->on('project_categories')->nullOnDelete();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('project_category_translations');
    }
}
