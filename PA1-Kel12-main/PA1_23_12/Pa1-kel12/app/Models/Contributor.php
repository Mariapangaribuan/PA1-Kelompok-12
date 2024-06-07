<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Contributor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'contributor';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'image',
        'phone',
        'address',
        'age',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function destination()
    {
        return $this->hasMany(Destination::class);
    }

    public function restaurant()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function accommodation()
    {
        return $this->hasMany(Accommodation::class);
    }

    public function testimonies()
    {
        return $this->hasMany(Testimony::class);
    }
}
