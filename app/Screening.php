<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class Screening extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;
    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'screenings';


    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'officer_name',
        'date_accomplished',
        'position',
        'phone_number',
        'is_identified_sus',
        'is_identified_prob',
        'sec_02_01',
        'sec_02_02',
        'sec_02_03',
        'sec_02_04',
        'sec_02_05',
        'sec_02_06',
        'sec_02_07',
        'sec_02_08',
        'sec_02_09',
        'sec_02_10',
        'sec_02_10_01',
        'sec_02_11',
        'sec_02_12',
        'sec_02_13',
        'sec_02_14',
        'sec_02_15',
        'sec_02_16',
        'sec_02_17',
        'sec_02_18',
        'sec_02_19',
        'sec_02_20',
        'sec_02_20_01',
        'sec_02_21',
        'sec_02_22',
        'sec_03_01',
        'sec_03_02',
        'sec_03_02_01',
        'sec_03_03',
        'sec_03_03_01',
        'sec_03_04',
        'sec_03_04_01',
        'sec_04_01_01',
        'sec_04_01_02',
        'sec_04_01_03',
        'sec_04_02_01',
        'sec_04_02_02',
        'sec_04_02_03',
        'sec_04_03',
        'sec_04_03_01',
        'sec_05_01_01',
        'sec_05_01_02',
        'sec_05_02_01',
        'sec_05_02_02',
        'sec_05_03_01',
        'sec_05_03_02',
        'sec_05_04_01',
        'sec_05_04_02',
        'sec_05_05_01',
        'sec_05_05_02',
        'sec_05_06_01',
        'sec_05_06_02',
        'sec_05_07_01',
        'sec_05_07_02',
        'sec_05_08_01',
        'sec_05_08_02',
        'sec_05_09_01',
        'sec_05_09_02',
        'sec_05_10_01',
        'sec_05_10_02',
        'sec_05_cd4_01',
        'sec_05_cd4_02',
        'sec_05_vl_01',
        'sec_05_vl_02',
        'sec_05_lx_01',
        'sec_05_lx_02',
        'sec_06_01',
        'sec_06_02',
        'sec_06_03',
        'sec_06_04',
        'is_fit',
        'physician_name',
        'physician_license',
        'physician_date',
        'is_eligible',
        'encoded_by',
        'updated_by',
    ];


    /**
     *  Array of table coloumns
     * 
     * 
     */
    protected $columns = [
            'id',
            'participant_id',
            'officer_name',
            'date_accomplished',
            'position',
            'phone_number',
            'is_identified_sus',
            'is_identified_prob',
            'sec_02_01',
            'sec_02_02',
            'sec_02_03',
            'sec_02_04',
            'sec_02_05',
            'sec_02_06',
            'sec_02_07',
            'sec_02_08',
            'sec_02_09',
            'sec_02_10',
            'sec_02_10_01',
            'sec_02_11',
            'sec_02_12',
            'sec_02_13',
            'sec_02_14',
            'sec_02_15',
            'sec_02_16',
            'sec_02_17',
            'sec_02_18',
            'sec_02_19',
            'sec_02_20',
            'sec_02_20_01',
            'sec_02_21',
            'sec_02_22',
            'sec_03_01',
            'sec_03_02',
            'sec_03_02_01',
            'sec_03_03',
            'sec_03_03_01',
            'sec_03_04',
            'sec_03_04_01',
            'sec_04_01_01',
            'sec_04_01_02',
            'sec_04_01_03',
            'sec_04_02_01',
            'sec_04_02_02',
            'sec_04_02_03',
            'sec_04_03',
            'sec_04_03_01',
            'sec_05_01_01',
            'sec_05_01_02',
            'sec_05_02_01',
            'sec_05_02_02',
            'sec_05_03_01',
            'sec_05_03_02',
            'sec_05_04_01',
            'sec_05_04_02',
            'sec_05_05_01',
            'sec_05_05_02',
            'sec_05_06_01',
            'sec_05_06_02',
            'sec_05_07_01',
            'sec_05_07_02',
            'sec_05_08_01',
            'sec_05_08_02',
            'sec_05_09_01',
            'sec_05_09_02',
            'sec_05_10_01',
            'sec_05_10_02',
            'sec_05_cd4_01',
            'sec_05_cd4_02',
            'sec_05_vl_01',
            'sec_05_vl_02',
            'sec_05_lx_01',
            'sec_05_lx_02',
            'sec_06_01',
            'sec_06_02',
            'sec_06_03',
            'sec_06_04',
            'is_fit',
            'physician_name',
            'physician_license',
            'physician_date',
            'is_eligible',
            'encoded_by',
            'updated_by',
            'created_at',
            'updated_at',
            'deleted_at',
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
     * Get the screening record
     * 
     * 
     */
    public function getScreening($id)
    {
        return $this->where('participant_id', $id)
                    ->first();
    }

    /**
     * Update the screening record
     * 
     * 
     */
    public function updateScreening($id, $data)
    {
        return $this->where('participant_id', $id)
                    ->update($data);
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
