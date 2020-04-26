<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCT extends Model
{
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'fct';
    
    /**
     * Get all the data
     * 
     * 
     */
    public function getAllFctData()
    {
        return FCT::all();
    }
}
