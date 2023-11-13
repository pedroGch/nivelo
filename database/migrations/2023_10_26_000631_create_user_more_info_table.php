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
        Schema::create('user_more_info', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('username')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('rol')->default('usuario');
            $table->unsignedInteger('user_id')->foreign('user_id')->references('id')->on('users')->ondelete('restrict')->onupdate('cascade'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_more_info');
    }
};
