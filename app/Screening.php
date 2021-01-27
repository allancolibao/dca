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
     *  Array of table coloumns
     * 
     * 
     */
    protected $columns = [
            'id', 'encoded_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at', 'participant_id',
            'officer_name',
            'date_accomplished',
            'position',
            'phone_number',
            'is_identified_symp',
            'is_identified_asymp',
            'is_confirmed',
            'sec_02_01',
            'sec_02_02',
            'sec_02_03',
            'sec_02_04',
            'sec_02_05',
            'sec_02_06',
            'sec_02_07',
            'sec_02_08',
            'sec_02_09',
            'sec_02_10_symp_01',
            'sec_02_10_symp_01_date',
            'sec_02_10_symp_02',
            'sec_02_10_symp_02_date',
            'sec_02_10_symp_03',
            'sec_02_10_symp_03_date',
            'sec_02_10_symp_04',
            'sec_02_10_symp_04_date',
            'sec_02_10_symp_05',
            'sec_02_10_symp_05_date',
            'sec_02_10_symp_06',
            'sec_02_10_symp_06_date',
            'sec_02_11',
            'sec_02_11_01',
            'sec_02_12',
            'sec_02_13',
            'sec_02_14',
            'sec_02_15',
            'sec_02_16',
            'sec_02_17',
            'sec_02_18',
            'sec_02_19',
            'sec_02_20',
            'sec_02_21',
            'sec_02_21_01',
            'sec_02_22',
            'sec_02_23',
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
            'wbc_si_01',
            'wbc_conv_01',
            'wbc_01_rem',
            'rbc_si_01',
            'rbc_conv_01',
            'rbc_01_rem',
            'hemo_si_01',
            'hemo_conv_01',
            'hemo_01_rem',
            'hema_si_01',
            'hema_conv_01',
            'hema_01_rem',
            'mcv_si_01',
            'mcv_conv_01',
            'mcv_01_rem',
            'mch_si_01',
            'mch_conv_01',
            'mch_01_rem',
            'mchc_si_01',
            'mchc_conv_01',
            'mchc_01_rem',
            'rdw_si_01',
            'rdw_conv_01',
            'rdw_01_rem',
            'pc_si_01',
            'pc_conv_01',
            'pc_01_rem',
            'mpv_si_01',
            'mpv_conv_01',
            'mpv_01_rem',
            'neu_si_01',
            'neu_conv_01',
            'neu_01_rem',
            'lymph_si_01',
            'lymph_conv_01',
            'lymph_01_rem',
            'mono_si_01',
            'mono_conv_01',
            'mono_01_rem',
            'eos_si_01',
            'eos_conv_01',
            'eos_01_rem',
            'baso_si_01',
            'baso_conv_01',
            'baso_01_rem',
            'fbs_si_01',
            'fbs_conv_01',
            'fbs_01_rem',
            'choles_si_01',
            'choles_conv_01',
            'choles_01_rem',
            'trig_si_01',
            'trig_conv_01',
            'trig_01_rem',
            'hdl_si_01',
            'hdl_conv_01',
            'hdl_01_rem',
            'ldl_si_01',
            'ldl_conv_01',
            'ldl_01_rem',
            'vldl_si_01',
            'vldl_conv_01',
            'vldl_01_rem',
            'cholhdl_si_01',
            'cholhdl_conv_01',
            'cholhdl_01_rem',
            'sgpt_si_01',
            'sgpt_conv_01',
            'sgpt_01_rem',
            'sgot_si_01',
            'sgot_conv_01',
            'sgot_01_rem',
            'crp_01',
            'crp_01_rem',
            'cd4_01',
            'cd4_rem_01',
            'sec_06_01_sys',
            'sec_06_01_dias',
            'sec_06_02',
            'sec_06_03',
            'sec_06_04',
            'is_fit',
            'physician_name',
            'physician_license',
            'physician_date',
            'is_eligible',
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
     *  Return column array
     * 
     * 
     */
    public function tableArray()
    {
        $columns = $this->columns;

        $collection = collect($columns);

        $filtered = $collection->except(['0','1','2','3','4','5','6']);

        return $filtered;
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
