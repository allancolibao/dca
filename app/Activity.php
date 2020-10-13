<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'activity_log';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'action', 'taken_by'
    ];
}
