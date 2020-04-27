<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

class CaseReport extends Model
{
    use SoftDeletes;
    use HasUpsertQueries;

    /**
     * Define base table
     * 
     * 
     */
    protected $table = 'case_reports';

    /**
     *  For table mass assignment
     * 
     * 
     */
    protected $fillable = [
        'participant_id',
        'date_admitted',
        'date_accomplished',
        'officer_name',
        'position',
        'phone_number',
        'sec_01_19_01',
        'sec_01_19_02',
        'sec_01_19_03',
        'sec_01_19_03_temp',
        'sec_01_19_04',
        'sec_01_19_05',
        'sec_01_19_06',
        'sec_02_anthrop_01',
        'sec_02_anthrop_02',
        'sec_02_anthrop_03',
        'sec_02_01_01',
        'sec_02_01_02',
        'sec_02_01_03',
        'sec_02_02_01',
        'sec_02_02_02',
        'sec_02_02_03',
        'sec_02_03_01',
        'sec_02_03_02',
        'sec_02_03_03',
        'sec_02_anthrop_rem_01',
        'sec_02_anthrop_rem_02',
        'sec_02_anthrop_rem_03',
        'sec_02_dia_01',
        'sec_02_dia_02',
        'sec_02_dia_03',
        'sec_02_04_01',
        'sec_02_04_02',
        'sec_02_04_03',
        'sec_02_dia_rem_01',
        'sec_02_dia_rem_02',
        'sec_02_dia_rem_03',
        'sec_02_lipid_01',
        'sec_02_lipid_02',
        'sec_02_lipid_03',
        'sec_02_05_01',
        'sec_02_05_02',
        'sec_02_05_03',
        'sec_02_06_01',
        'sec_02_06_02',
        'sec_02_06_03',
        'sec_02_07_01',
        'sec_02_07_02',
        'sec_02_07_03',
        'sec_02_lipid_rem_01',
        'sec_02_lipid_rem_02',
        'sec_02_lipid_rem_03',
        'sec_02_liver_01',
        'sec_02_liver_02',
        'sec_02_liver_03',
        'sec_02_08_01',
        'sec_02_08_02',
        'sec_02_08_03',
        'sec_02_09_01',
        'sec_02_09_02',
        'sec_02_09_03',
        'sec_02_liver_rem_01',
        'sec_02_liver_rem_02',
        'sec_02_liver_rem_03',
        'sec_02_cli_01',
        'sec_02_cli_02',
        'sec_02_cli_03',
        'sec_02_10_01',
        'sec_02_10_02',
        'sec_02_10_03',
        'sec_02_11_01',
        'sec_02_11_02',
        'sec_02_11_03',
        'sec_02_12_01',
        'sec_02_12_02',
        'sec_02_12_03',
        'sec_02_13_01',
        'sec_02_13_02',
        'sec_02_13_03',
        'sec_02_14_01',
        'sec_02_14_02',
        'sec_02_14_03',
        'sec_02_15_01',
        'sec_02_15_02',
        'sec_02_15_03',
        'sec_02_16_01',
        'sec_02_16_02',
        'sec_02_16_03',
        'sec_02_17_01',
        'sec_02_17_02',
        'sec_02_17_03',
        'sec_02_cli_rem_01',
        'sec_02_cli_rem_02',
        'sec_02_cli_rem_03',
        'sec_02_sign_01',
        'sec_02_sign_02',
        'sec_02_sign_03',
        'sec_02_cough_01',
        'sec_02_cough_02',
        'sec_02_cough_03',
        'sec_02_breath_01',
        'sec_02_breath_02',
        'sec_02_breath_03',
        'sec_02_fever_01',
        'sec_02_fever_02',
        'sec_02_fever_03',
        'sec_02_tiredness_01',
        'sec_02_tiredness_02',
        'sec_02_tiredness_03',
        'sec_02_diarrhea_01',
        'sec_02_diarrhea_02',
        'sec_02_diarrhea_03',
        'sec_02_oth_01',
        'sec_02_oth_01_01',
        'sec_02_oth_01_02',
        'sec_02_oth_01_03',
        'sec_02_oth_02',
        'sec_02_oth_02_01',
        'sec_02_oth_02_02',
        'sec_02_oth_02_03',
        'sec_02_oth_03',
        'sec_02_oth_03_01',
        'sec_02_oth_03_02',
        'sec_02_oth_03_03',
        'sec_02_oth_04',
        'sec_02_oth_04_01',
        'sec_02_oth_04_02',
        'sec_02_oth_04_03',
        'sec_02_oth_05',
        'sec_02_oth_05_01',
        'sec_02_oth_05_02',
        'sec_02_oth_05_03',
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
        'date_admitted',
        'date_accomplished',
        'officer_name',
        'position',
        'phone_number',
        'sec_01_19_01',
        'sec_01_19_02',
        'sec_01_19_03',
        'sec_01_19_03_temp',
        'sec_01_19_04',
        'sec_01_19_05',
        'sec_01_19_06',
        'sec_02_anthrop_01',
        'sec_02_anthrop_02',
        'sec_02_anthrop_03',
        'sec_02_01_01',
        'sec_02_01_02',
        'sec_02_01_03',
        'sec_02_02_01',
        'sec_02_02_02',
        'sec_02_02_03',
        'sec_02_03_01',
        'sec_02_03_02',
        'sec_02_03_03',
        'sec_02_anthrop_rem_01',
        'sec_02_anthrop_rem_02',
        'sec_02_anthrop_rem_03',
        'sec_02_dia_01',
        'sec_02_dia_02',
        'sec_02_dia_03',
        'sec_02_04_01',
        'sec_02_04_02',
        'sec_02_04_03',
        'sec_02_dia_rem_01',
        'sec_02_dia_rem_02',
        'sec_02_dia_rem_03',
        'sec_02_lipid_01',
        'sec_02_lipid_02',
        'sec_02_lipid_03',
        'sec_02_05_01',
        'sec_02_05_02',
        'sec_02_05_03',
        'sec_02_06_01',
        'sec_02_06_02',
        'sec_02_06_03',
        'sec_02_07_01',
        'sec_02_07_02',
        'sec_02_07_03',
        'sec_02_lipid_rem_01',
        'sec_02_lipid_rem_02',
        'sec_02_lipid_rem_03',
        'sec_02_liver_01',
        'sec_02_liver_02',
        'sec_02_liver_03',
        'sec_02_08_01',
        'sec_02_08_02',
        'sec_02_08_03',
        'sec_02_09_01',
        'sec_02_09_02',
        'sec_02_09_03',
        'sec_02_liver_rem_01',
        'sec_02_liver_rem_02',
        'sec_02_liver_rem_03',
        'sec_02_cli_01',
        'sec_02_cli_02',
        'sec_02_cli_03',
        'sec_02_10_01',
        'sec_02_10_02',
        'sec_02_10_03',
        'sec_02_11_01',
        'sec_02_11_02',
        'sec_02_11_03',
        'sec_02_12_01',
        'sec_02_12_02',
        'sec_02_12_03',
        'sec_02_13_01',
        'sec_02_13_02',
        'sec_02_13_03',
        'sec_02_14_01',
        'sec_02_14_02',
        'sec_02_14_03',
        'sec_02_15_01',
        'sec_02_15_02',
        'sec_02_15_03',
        'sec_02_16_01',
        'sec_02_16_02',
        'sec_02_16_03',
        'sec_02_17_01',
        'sec_02_17_02',
        'sec_02_17_03',
        'sec_02_cli_rem_01',
        'sec_02_cli_rem_02',
        'sec_02_cli_rem_03',
        'sec_02_sign_01',
        'sec_02_sign_02',
        'sec_02_sign_03',
        'sec_02_cough_01',
        'sec_02_cough_02',
        'sec_02_cough_03',
        'sec_02_breath_01',
        'sec_02_breath_02',
        'sec_02_breath_03',
        'sec_02_fever_01',
        'sec_02_fever_02',
        'sec_02_fever_03',
        'sec_02_tiredness_01',
        'sec_02_tiredness_02',
        'sec_02_tiredness_03',
        'sec_02_diarrhea_01',
        'sec_02_diarrhea_02',
        'sec_02_diarrhea_03',
        'sec_02_oth_01',
        'sec_02_oth_01_01',
        'sec_02_oth_01_02',
        'sec_02_oth_01_03',
        'sec_02_oth_02',
        'sec_02_oth_02_01',
        'sec_02_oth_02_02',
        'sec_02_oth_02_03',
        'sec_02_oth_03',
        'sec_02_oth_03_01',
        'sec_02_oth_03_02',
        'sec_02_oth_03_03',
        'sec_02_oth_04',
        'sec_02_oth_04_01',
        'sec_02_oth_04_02',
        'sec_02_oth_04_03',
        'sec_02_oth_05',
        'sec_02_oth_05_01',
        'sec_02_oth_05_02',
        'sec_02_oth_05_03',
        'encoded_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ]; 

    /**
     * Exclude scope method
     * 
     * 
     */
    public function scopeExclude($query,$value = array())
    {

        return $query->select( array_diff( $this->columns,(array) $value) );

    }

    /**
     * Get the case-report record
     * 
     * 
     */
    public function getCaseReport($id)
    {
        return $this->where('participant_id', $id)
                    ->first();
    }

    /**
     * Update the case-report record
     * 
     * 
     */
    public function updateCaseReport($id, $data)
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
