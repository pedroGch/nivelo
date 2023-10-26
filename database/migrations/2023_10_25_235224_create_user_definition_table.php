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
        Schema::create('user_definition', function (Blueprint $table) {
            $table->id();
            $table->boolean('sticks')->default(false);
            $table->boolean('crutches')->default(false);
            $table->boolean('walker')->default(false);
            $table->boolean('difficult_walking')->default(false);
            $table->boolean('manual_wheelchair')->default(false);
            $table->boolean('electric_wheelchair')->default(false);
            $table->boolean('scooter')->default(false);
            $table->boolean('companion')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_definition');
    }
};
