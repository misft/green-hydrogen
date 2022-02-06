<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotHasContentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_has_content_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slot_has_content_id')->references('id')->on('slot_has_contents');
            $table->foreignId('translation_id')->references('id')->on('translations');
            $table->json('content');
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
        Schema::dropIfExists('slot_has_content_translations');
    }
}
