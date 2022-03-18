<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function(Blueprint $table) {
            $table->dropColumn('description');
        });
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations')->nullOnDelete();
            $table->foreignId('project_id')->nullable()->references('id')->on('projects')->nullOnDelete();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('project_translations');
        Schema::table('projects', function(Blueprint $table) {
            $table->text('description')->nullable();
        });
    }
}
