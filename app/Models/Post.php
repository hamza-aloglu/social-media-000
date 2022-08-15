<?php

namespace App\Models;

use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model implements likeable
{
    use HasFactory;
    use likes;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'keywords',
        'description',
        'image',
        'image_public_id',
        'detail',
        'status',
    ];

    #many to one
    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
