<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestructureFirstToProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->foreignId('city_id')->nullable()->references('id')->on('cities')->nullOnDelete();
            $table->text('description')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('image')->nullable();
            $table->string('logo')->nullable();
            $table->string('member_of_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->dropForeign(['city_id']);
            $table->dropColumn('description');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->dropColumn('image');
            $table->dropColumn('logo');
            $table->dropColumn('member_of_image');
        });
    }
}
