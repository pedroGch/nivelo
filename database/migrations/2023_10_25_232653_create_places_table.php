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
            $table->id('place_id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('coordinates')->nullable();
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
            $table->unsignedInteger('src_info_id')->foreign('src_info_id')->references('src_info_id')->on('src_information')->ondelete('restrict')->onupdate('cascade');; // FK
            $table->unsignedInteger('review_id')->nullable()->foreign('review_id')->references('review_id')->on('reviews')->ondelete('restrict')->onupdate('cascade');; // FK
            $table->unsignedInteger('category_id')->foreign('category_id')->references('category_id')->on('categories')->ondelete('restrict')->onupdate('cascade');; // FK
            $table->unsignedInteger('uploaded_from_id')->foreign('uploaded_from_id')->references('id')->on('users')->ondelete('restrict')->onupdate('cascade');; // FK
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
