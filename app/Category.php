<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The users that belong to the Category.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->using('App\CategoryUser');
    }
}
