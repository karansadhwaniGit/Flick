<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Thomaswelton\LaravelGravatar\Facades\Gravatar;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN="admin";
    const AUTHOR="author";
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function isAdmin()
    {
        return $this->roles === self::ADMIN;
    }
    public function getGravatarImageAttribute():string
    {
        return Gravatar::src($this->email);
    }
}
