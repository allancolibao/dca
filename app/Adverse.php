<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Adverse extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;

    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'adverse_event';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'ae_serious',
        'ae_unexpected',
        'ae_related',
        'ae_occurring',
        'ae_01_physician',
        'ae_01_nurse',
        'ae_01_rnd',
        'ae_02',
        'ae_03',
        'ae_04',
        'ae_05',
        'ae_05_action',
        'ae_05_urgency',
        'ae_06',
        'ae_07',
        'ae_08',
        'ae_09',
        'ae_rel_physician',
        'ae_rel_nurse',
        'ae_rel_rnd',
        'ae_10',
        'ae_11',
        'ae_12',
        'ae_13',
        'ae_13_01',
        'ae_14',
        'ae_date',
        'ae_name',
        'ae_contact_person',
        'ae_email',
        'ae_title',
        'ae_15_01',
        'ae_15_02',
        'ae_15_principal',
        'ae_15_date',
        'ae_16_name',
        'ae_16_date',
        'ae_16',
        'ae_16_comment',
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
        'ae_serious',
        'ae_unexpected',
        'ae_related',
        'ae_occurring',
        'ae_01_physician',
        'ae_01_nurse',
        'ae_01_rnd',
        'ae_02',
        'ae_03',
        'ae_04',
        'ae_05',
        'ae_05_action',
        'ae_05_urgency',
        'ae_06',
        'ae_07',
        'ae_08',
        'ae_09',
        'ae_rel_physician',
        'ae_rel_nurse',
        'ae_rel_rnd',
        'ae_10',
        'ae_11',
        'ae_12',
        'ae_13',
        'ae_13_01',
        'ae_14',
        'ae_date',
        'ae_name',
        'ae_contact_person',
        'ae_email',
        'ae_title',
        'ae_15_01',
        'ae_15_02',
        'ae_15_principal',
        'ae_15_date',
        'ae_16_name',
        'ae_16_date',
        'ae_16',
        'ae_16_comment',
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
     * Get the record data of the participant
     * 
     * 
     */
    public function getAdverseEventData($id)
    {
        return $this->where('participant_id', $id)->first();
    }

    /**
     * Update the record header data
     * 
     * 
     */
    public function updateAdverse($id, $data)
    {
        return $this->where('participant_id', $id)
                    ->update($data);
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
