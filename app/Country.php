<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Get all of the cities for the country.
     */
    public function cities()
    {
        // return $this->hasManyThrough('App\City', 'App\State');
        return $this->hasManyThrough('App\City', 'App\State','country_id','state_id','id');
    }
}
