<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDirectoryTopicTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_directory_topic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->references('id')->on('translations')->nullOnDelete();
            $table->unsignedBigInteger('company_directory_topic_id');
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
        Schema::dropIfExists('company_directory_topic_translations');
    }
}
