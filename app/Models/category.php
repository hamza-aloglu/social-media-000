<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    #one to many
    public function products ()
    {
        return $this->hasMany(Post::class);
    }
}
