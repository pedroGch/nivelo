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
        Schema::create('review_by_user', function (Blueprint $table) {
            $table->id();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade'); // FK
            //$table->foreign('review_id')->references('id')->on('reviews')->onDelete('restrict')->onUpdate('cascade'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_by_user');
    }
};
