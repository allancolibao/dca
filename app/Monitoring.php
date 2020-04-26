<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Monitoring extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;
    
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'monitoring_data';

     /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'mon_day',
        'mon_date',
        'mon_temp',
        'mon_chills',
        'mon_conjunct',
        'mon_cough',
        'mon_diarrhea',
        'mon_runny',
        'mon_breath',
        'mon_throat',
        'mon_appetite',
        'mon_smell',
        'mon_confusion',
        'mon_seizures',
        'mon_vomiting',
        'mon_muscle_pain',
        'mon_chest_pain',
        'mon_other',
        'mon_other_note',
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
        'mon_day',
        'mon_date',
        'mon_temp',
        'mon_chills',
        'mon_conjunct',
        'mon_cough',
        'mon_diarrhea',
        'mon_runny',
        'mon_breath',
        'mon_throat',
        'mon_appetite',
        'mon_smell',
        'mon_confusion',
        'mon_seizures',
        'mon_vomiting',
        'mon_muscle_pain',
        'mon_chest_pain',
        'mon_other',
        'mon_other_note',
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
     *  Get monitoring data
     * 
     * 
     */
    public function getMonitoringData($id)
    {
        return $this->where('participant_id', $id)
                    ->get();
    }

    /**
     *  Get specific monitoring data
     * 
     * 
     */
    public function getSpecificMonitoringData($id, $day)
    {
        return $this->where('participant_id', $id)
                    ->where('mon_day', $day)
                    ->first();
    }

    /**
     *  Update specific monitoring data
     * 
     * 
     */
    public function updateMonitoring($id, $day, $data)
    {
        return $this->where('participant_id', $id)
                    ->where('mon_day', $day)
                    ->update($data);
    }
}
