<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['commentable'];

     /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}

