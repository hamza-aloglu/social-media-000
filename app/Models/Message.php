<?php

namespace App\Models;

use Database\Factories\MessageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'email',
      'subject',
      'phone',
      'message',
    ];

    protected static function newFactory(): MessageFactory
    {
        return MessageFactory::new();
    }
}
