<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Participant extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;
    
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'participants';


    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'hospital',
        'participant_id',
        'full_name',
        'sex',
        'csc',
        'birth_date',
        'age',
        'educ_attainment',
        'specify_educ',
        'occupation',
        'home_address',
        'contact',
        'participant_status',
        'participant_group',
        'is_agreed',
        'assent_date',
        'witness_name',
        'witness_mobile',
        'witness_address',
        'admitting_officer',
        'admitting_officer_date',
        'encoded_by',
        'updated_by'
    ]; 


     /**
     *  Array of table coloumns
     * 
     * 
     */
    protected $columns = [
        'id',
        'hospital',
        'participant_id',
        'full_name',
        'sex',
        'csc',
        'birth_date',
        'age',
        'educ_attainment',
        'specify_educ',
        'occupation',
        'home_address',
        'contact',
        'participant_status',
        'participant_group',
        'is_agreed',
        'assent_date',
        'witness_name',
        'witness_mobile',
        'witness_address',
        'admitting_officer',
        'admitting_officer_date',
        'is_transmitted',
        'encoded_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ]; 
    
    
     /**
     *  Exclude scope method
     * 
     * 
     */
    public function scopeExclude($query,$value = array())
    {

        return $query->select( array_diff( $this->columns,(array) $value) );

    }

    /**
    * Collect all the participants data
    *
    *
    */
    public function getAllParticipant()
    {   
        return $this->orderBy('participant_id', 'ASC')->get();
    }


    /**
    * Get the specific participant data
    *
    *
    */
    public function getParticipant($id)
    {   
        return $this->where('participant_id', $id)
                    ->first();
    }


    /**
     * Update the participant data
     * 
     * 
     */
    public function updateParticipant($id, $data)
    {
        return $this->where('id', $id)
                    ->update($data);
    }


    /**
    * Get specific the participant data
    *
    *
    */
    public function getAllDeletedParticipant()
    {   
        return $this->onlyTrashed()->get();
    }

    /**
    * Restore the participant data
    *
    *
    */
    public function restoreParticipant($id)
    {   
        return $this->onlyTrashed()
                    ->where('participant_id', $id)
                    ->restore();
    }
}
