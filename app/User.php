<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];


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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
