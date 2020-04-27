<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Header extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;

    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'record_headers';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'record_date',
        'record_day',
        'accom_by',
        'position',
        'date',
        'encoded_by',
        'updated_by'
    ];

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $columns = [
        'id',
        'participant_id',
        'record_date',
        'record_day',
        'accom_by',
        'position',
        'date',
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
     * Get all the record dates of the participant
     * 
     * 
     */
    public function getRecordDate($id)
    {
        return $this->where('participant_id', $id)->orderBy('record_date', 'DESC')->get();
    }

    /**
     * Get the record data of the participant
     * 
     * 
     */
    public function getRecordHeader($id, $date)
    {
        return $this->where('participant_id', $id)->where('record_date', $date)->first();
    }

    /**
     * Update the record header data
     * 
     * 
     */
    public function recordDate($participantId, $date, $data)
    {
        return $this->where('participant_id', $participantId)
                    ->where('record_date', $date)
                    ->update($data);
    }

     /**
     *  Delete record header data
     * 
     * 
     */
    public function deleteRecordDate($id)
    {
        return $this->where('participant_id', $id);
    }

    /**
    * Get specific the participant data
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
