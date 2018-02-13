<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that belong to the role.
     */
    public function users()
    {
        // return $this->belongsToMany('App\User');
        // return $this->belongsToMany('App\User', 'role_user');
        // return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
        // return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id')->withPivot('created_at', 'updated_at');
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id')->withTimestamps();

    }
}
