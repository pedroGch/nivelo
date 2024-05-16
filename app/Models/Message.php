<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
  use HasFactory;

  protected $table = 'messages';

  public function chat()
  {
      return $this->belongsTo(Chat::class);
  }

  public function sender()
  {
      return $this->belongsTo(User::class, 'sender_id');
  }

}
