<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("gallery_id");
            $table->foreign("gallery_id")->references('id')->on('img_galleries');
            $table->char('src', 60);
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
        Schema::dropIfExists('imgs');
    }
}
