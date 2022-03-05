<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->nullOnDelete();
            $table->foreignId('region_id')->nullable()->references('id')->on('regions')->nullOnDelete();
            $table->foreignId('project_category_id')->nullable()->references('id')->on('project_categories')->nullOnDelete();
            $table->string('name');
            $table->string('status');
            $table->string('contact');
            $table->string('email');
            $table->string('website');
            $table->string('city');
            $table->integer('total_budget');
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
        Schema::dropIfExists('projects');
    }
}
