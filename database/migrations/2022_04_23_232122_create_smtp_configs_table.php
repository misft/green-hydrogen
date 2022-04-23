<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_configs', function (Blueprint $table) {
            $table->id();
            $table->string('smtp_server');
            $table->string('smtp_port');
            $table->string('smtp_username');
            $table->string('smtp_password');
            $table->string('smtp_auth');
            $table->string('smtp_from');
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
        Schema::dropIfExists('smtp_configs');
    }
}
