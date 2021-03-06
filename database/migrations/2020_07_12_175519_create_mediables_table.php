<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediables', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media');

            $table->smallInteger('w')->nullable();
            $table->smallInteger('h')->nullable();
            $table->string('flip')->nullable();
            $table->string('fit')->nullable();
            $table->string('crop')->nullable();
            $table->smallInteger('blur')->nullable();


            $table->morphs('mediables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mediables');
    }
}
