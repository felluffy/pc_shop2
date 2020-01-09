<?php

namespace App\Models;

use App\Models\Wishlist;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'city', 'country', 'post_code', 'phone_number', 'state'
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

    public function getFullNameAttribute()
    {
        return $this->first_name. ' '. $this->last_name;
    }

    //has many favorite categories
    // public function categories()
    // {
    //     return $this->hasMany(Category::class);
    // }
    // public function brands()
    // {
    //     return $this->hasMany(Brand::class);
    // }

    public function reviews()
    {
        $this->hasMany(Review::class);
    }

    public function products()
    {
        return $this->hasMany(Wishlist::class);
    }
}
