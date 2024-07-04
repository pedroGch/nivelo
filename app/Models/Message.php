<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
  use HasFactory;

  protected $table = 'messages';

  protected $fillable = [
    'chat_id',
    'user_id',
    'message',
    'read',
  ];

  public function chat()
  {
      return $this->belongsTo(Chat::class);
  }

  public function sender()
  {
      return $this->belongsTo(User::class, 'sender_id');
  }

}
