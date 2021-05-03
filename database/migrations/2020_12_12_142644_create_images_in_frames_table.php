<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesInFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_in_frames', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('frame_id');
            $table->unsignedBigInteger('image_id');


            $table->foreign('frame_id')
            ->references('id')
            ->on('frames')
            ->onDelete('cascade');
            
            $table->foreign('image_id')
            ->references('id')
            ->on('images')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('images_in_frames');
    }
}
