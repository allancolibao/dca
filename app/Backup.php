<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    /* Define base table
    * 
    * 
    */
   protected $table = 'backup';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['filename'];

}

