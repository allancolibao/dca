<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Record extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;
    
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'record_data';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'record_date',
        'line_no',
        'food_item',
        'fi_amount_size',
        'plate_waste',
        'pw_amount_size',
        'rf_code',
        'meal_code',
        'food_code',
        'fic',
        'food_weight',
        'fw_rcc',
        'fw_cmc',
        'supply_code',
        'src_code',
        'pw_weight',
        'pw_rcc',
        'pw_cmc',
        'unit_cost',
        'unit_weight',
        'unit_meas',
        'encoded_by',
        'updated_by',
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
        'line_no',
        'food_item',
        'fi_amount_size',
        'plate_waste',
        'pw_amount_size',
        'rf_code',
        'meal_code',
        'food_code',
        'fic',
        'food_weight',
        'fw_rcc',
        'fw_cmc',
        'supply_code',
        'src_code',
        'pw_weight',
        'pw_rcc',
        'pw_cmc',
        'unit_cost',
        'unit_weight',
        'unit_meas',
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
    * Get the specific participant record data
    *
    *
    */
    public function getParticipantRecord($id)
    {   
        return $this->where('participant_id', $id)
                    ->get();
    }


    /**
     * Get the record data
     * 
     * 
     */
    public function getRecordData($participantId, $recordDate)
    {
        return $this->where('participant_id', $participantId)
                    ->where('record_date',  $recordDate)
                    ->orderBy('line_no', 'ASC')
                    ->get();
    }

    /**
     * Update the record data
     * 
     * 
     */
    public function updateRecord($rowId, $participantId, $recordDate, $data)
    {
        return $this->where('id',  $rowId)
                    ->where('participant_id', $participantId)
                    ->where('record_date',  $recordDate)  
                    ->update($data);
    }

    /**
     * Update the record date
     * 
     * 
     */
    public function updateAllRecordDate($participantId, $recordDate, $data)
    {
        return $this->where('participant_id', $participantId)
                    ->where('record_date',  $recordDate)  
                    ->update($data);
    }

    /**
     *  Delete record data
     * 
     * 
     */
    public function deleteParticipantRecord($id)
    {
        return $this->where('participant_id', $id);
    }


    /**
     *  Delete specific line number
     * 
     * 
     */
    public function deleteLineNumber($id)
    {
        return $this->where('id', $id)->delete();
    }


    /**
     * Update the line number before delete
     * 
     * 
     */
    public function updateLineNumber($id, $data)
    {
        return $this->where('id', $id)
                    ->update($data);
    }


    /**
    * Get the max line number
    *
    *
    */
    public function getMaxLineNumber($patid, $date)
    {   
        return $this->where('participant_id', $patid)
                    ->where('record_date', $date)
                    ->onlyTrashed()
                    ->max('line_no');
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

    /**
    * Restore the line number of specific day
    *
    *
    */
    public function getDeletedLineNumber($id, $date)
    {   
        return $this->onlyTrashed()
                    ->where('participant_id', $id)
                    ->where('record_date', $date)
                    ->get();
    }


    /**
    * Restore the line number
    *
    *
    */
    public function restoreLineNumber($id)
    {   
        return $this->onlyTrashed()
                    ->where('id', $id)
                    ->restore();
    }

}
