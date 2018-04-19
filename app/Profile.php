<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['avatar','github_url','facebook_url','twitter_url','user_id','description'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getAvatarAttribute($avatar){
        return asset($avatar);
    }
}
