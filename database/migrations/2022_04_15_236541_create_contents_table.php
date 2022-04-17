<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->references('id')->on('translations')->cascadeOnDelete();
            $table->foreignId('spot_id')->references('id')->on('spots')->cascadeOnDelete();
            $table->string('name');
            $table->string('types'); // image or text
            $table->string('positions'); // left or right || up or down || middle depend on fix design landing page UI
            $table->integer('order')->default(0);
            $table->text('content')->comment('Jika tipe image, maka isikan path dan nama image. Jika tipe string, maka isi string biasa atau tag html');
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
        Schema::dropIfExists('contents');
    }
}
