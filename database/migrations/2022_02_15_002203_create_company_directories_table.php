<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_directories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->references('id')->on('regions')->cascadeOnDelete();
            $table->foreignId('company_directory_topic_id')->references('id')->on('company_directory_topics')->cascadeOnDelete();
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('contact')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
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
        Schema::dropIfExists('company_directories');
    }
}
