<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDirectoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_directory_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations')->nullOnDelete();
            $table->foreignId('company_directory_id')->nullable()->references('id')->on('company_directories')->nullOnDelete();
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
        Schema::dropIfExists('company_directory_translations');
    }
}
