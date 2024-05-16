<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::create('chats', function (Blueprint $table) {
          $table->id();
          $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
          $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
          $table->timestamp('started_at')->useCurrent();
          $table->timestamps();
      });
  }

  public function down()
  {
      Schema::dropIfExists('chats');
  }
};
