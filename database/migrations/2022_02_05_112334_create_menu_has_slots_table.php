<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuHasSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_has_slots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->nullable()->references('id')->on('menus')->nullOnDelete();
            $table->foreignId('slot_id')->nullable()->references('id')->on('slots')->nullOnDelete();
            $table->integer('order');
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
        Schema::dropIfExists('menu_has_slots');
    }
}
