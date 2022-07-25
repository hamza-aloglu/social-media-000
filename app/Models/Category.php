<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parentid',
        'title',
        'keywords',
        'description',
        'image',
        'status',
    ];


    #one to many
    public function products ()
    {
        return $this->hasMany(Post::class);
    }

    #One to Many inverse
    public function parent()
    {
        return $this->belongsTo(category::class, 'parentid');
    }
    #one to many
    public function children()
    {
        return $this->hasMany(category::class, 'parentid');
    }
}
