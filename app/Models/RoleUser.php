<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    public $timestamps = false;
    public int $role_id;
    public int $user_id;

}
