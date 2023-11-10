<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('review_id');
            $table->unsignedInteger('place_id')->foreign('place_id')->references('place_id')->on('places')->ondelete('restrict')->onupdate('cascade');
            $table->unsignedInteger('user_id')->foreign('user_id')->references('id')->on('users')->ondelete('restrict')->onupdate('cascade'); // FK
            $table->text('review')->nullable();
            $table->string('pic_1')->nullable();
            $table->string('alt_pic_1')->nullable();
            $table->string('pic_2')->nullable();
            $table->string('alt_pic_2')->nullable();
            $table->string('pic_3')->nullable();
            $table->string('alt_pic_3')->nullable();
            $table->tinyInteger('score')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
