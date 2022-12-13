<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('albums');
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->string('name'); 
            $table->string('cover')->default('public/covers/no-image.png');           
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
        Schema::dropIfExists('albums');
    }
};
