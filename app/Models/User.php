<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }


    public function friendsTo()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->withPivot('accepted')
            ->withTimestamps();
    }

    public function friendsFrom()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
            ->withPivot('accepted')
            ->withTimestamps();
    }

    public function pendingFriendsTo()
    {
        return $this->friendsTo()->wherePivot('accepted', 0);
    }

    public function pendingFriendsFrom()
    {
        return $this->friendsFrom()->wherePivot('accepted', 0);
    }

    public function acceptedFriendsTo()
    {
        return $this->friendsTo()->wherePivot('accepted', 1);
    }

    public function acceptedFriendsFrom()
    {
        return $this->friendsFrom()->wherePivot('accepted', 1);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
