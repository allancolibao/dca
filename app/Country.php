<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'country';
    
    /**
     * Get all the data
     * 
     * 
     */
    public function getAllCountryData()
    {
        return Country::all();
    }
}
