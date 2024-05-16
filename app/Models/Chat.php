<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
  use HasFactory;

  protected $table = 'chats';

  public function sender()
  {
      return $this->belongsTo(User::class, 'sender_id');
  }

  public function receiver()
  {
      return $this->belongsTo(User::class, 'receiver_id');
  }

  public function messages()
  {
      return $this->hasMany(Message::class);
  }
}
