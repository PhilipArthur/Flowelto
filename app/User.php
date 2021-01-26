<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'address', 'gender', 'dob', 'role'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'carts')->withPivot('quantity');
    }
}
