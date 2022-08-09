<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 
        'password', 
        'role',
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

    /**
     * Set the user's password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the news associated with the user.
     */
    public function news()
    {
        return $this->hasMany(News::class, 'user_id');
    }

    /**
     * Get the gallery associated with the user.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'user_id');
    }

    /**
     * Get the announcement associated with the user.
     */
    public function announcement()
    {
        return $this->hasMany(Announcement::class, 'user_id');
    }

    /**
     * Get the personal information associated with the user.
     */
    public function personal()
    {
        return $this->hasOne(Personal::class, 'user_id');
    }
}
