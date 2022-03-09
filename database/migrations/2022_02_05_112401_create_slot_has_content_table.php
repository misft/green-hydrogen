<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotHasContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_has_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_has_slot_id')->nullable()->references('id')->on('menu_has_slots')->nullOnDelete();
            $table->foreignId('content_type_id')->nullable()->references('id')->on('content_types')->nullOnDelete();
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
        Schema::dropIfExists('slot_has_content_types');
    }
}
