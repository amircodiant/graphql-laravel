<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        // return $this->belongsToMany('App\Role');
        // return $this->belongsToMany('App\Role', 'role_user');
        // return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withPivot('created_at', 'updated_at');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
