<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','admin'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile(){
        return $this->hasOne('App\Profile');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
