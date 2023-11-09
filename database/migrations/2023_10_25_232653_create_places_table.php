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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('coordinates');
            $table->text('description')->nullable();
            $table->string('main_img')->nullable();
            $table->string('alt_main_img')->nullable();
            $table->boolean('access_entrance')->default(false);
            $table->boolean('assisted_access_entrance')->default(false);
            $table->boolean('internal_circulation')->default(false);
            $table->boolean('bathroom')->default(false);
            $table->boolean('adult_changing_table')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('elevator')->default(false);
            $table->unsignedInteger('src_info_id'); // FK
            $table->unsignedInteger('review_id')->nullable(); // FK
            $table->unsignedInteger('category_id'); // FK
            $table->unsignedInteger('uploaded_from_id'); // FK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
