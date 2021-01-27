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
     *  Array of table coloumns
     * 
     */
    protected $columns = [
        'id', 'encoded_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at', 'participant_id',
        'date_admitted',
        'date_accomplished',
        'officer_name',
        'position',
        'phone_number',
        'baseline_date',
        'midline_date',
        'endline_date',
        'dry_cough_01',
        'dry_cough_02',
        'dry_cough_03',
        'breath_diff_01',
        'breath_diff_02',
        'breath_diff_03',
        'fever_01',
        'fever_02',
        'fever_03',
        'tiredness_01',
        'tiredness_02',
        'tiredness_03',
        'diarrhea_01',
        'diarrhea_02',
        'diarrhea_03',
        'sign_oth_01',
        'sign_oth_01_01',
        'sign_oth_01_02',
        'sign_oth_01_03',
        'sign_oth_02',
        'sign_oth_02_01',
        'sign_oth_02_02',
        'sign_oth_02_03',
        'sign_oth_03',
        'sign_oth_03_01',
        'sign_oth_03_02',
        'sign_oth_03_03',
        'sign_oth_04',
        'sign_oth_04_01',
        'sign_oth_04_02',
        'sign_oth_04_03',
        'sign_oth_05',
        'sign_oth_05_01',
        'sign_oth_05_02',
        'sign_oth_05_03',
        'weight_01',
        'weight_02',
        'weight_03',
        'height_01',
        'height_02',
        'height_03',
        'bmi_01',
        'bmi_02',
        'bmi_03',
        'bmi_rem_01',
        'bmi_rem_02',
        'bmi_rem_03',
        'wbc_si_01',
        'wbc_conv_01',
        'wbc_si_02',
        'wbc_conv_02',
        'wbc_si_03',
        'wbc_conv_03',
        'wbc_01_rem',
        'wbc_02_rem',
        'wbc_03_rem',
        'rbc_si_01',
        'rbc_conv_01',
        'rbc_si_02',
        'rbc_conv_02',
        'rbc_si_03',
        'rbc_conv_03',
        'rbc_01_rem',
        'rbc_02_rem',
        'rbc_03_rem',
        'hemo_si_01',
        'hemo_conv_01',
        'hemo_si_02',
        'hemo_conv_02',
        'hemo_si_03',
        'hemo_conv_03',
        'hemo_01_rem',
        'hemo_02_rem',
        'hemo_03_rem',
        'hema_si_01',
        'hema_conv_01',
        'hema_si_02',
        'hema_conv_02',
        'hema_si_03',
        'hema_conv_03',
        'hema_01_rem',
        'hema_02_rem',
        'hema_03_rem',
        'mcv_si_01',
        'mcv_conv_01',
        'mcv_si_02',
        'mcv_conv_02',
        'mcv_si_03',
        'mcv_conv_03',
        'mcv_01_rem',
        'mcv_02_rem',
        'mcv_03_rem',
        'mch_si_01',
        'mch_conv_01',
        'mch_si_02',
        'mch_conv_02',
        'mch_si_03',
        'mch_conv_03',
        'mch_01_rem',
        'mch_02_rem',
        'mch_03_rem',
        'mchc_si_01',
        'mchc_conv_01',
        'mchc_si_02',
        'mchc_conv_02',
        'mchc_si_03',
        'mchc_conv_03',
        'mchc_01_rem',
        'mchc_02_rem',
        'mchc_03_rem',
        'rdw_si_01',
        'rdw_conv_01',
        'rdw_si_02',
        'rdw_conv_02',
        'rdw_si_03',
        'rdw_conv_03',
        'rdw_01_rem',
        'rdw_02_rem',
        'rdw_03_rem',
        'pc_si_01',
        'pc_conv_01',
        'pc_si_02',
        'pc_conv_02',
        'pc_si_03',
        'pc_conv_03',
        'pc_01_rem',
        'pc_02_rem',
        'pc_03_rem',
        'mpv_si_01',
        'mpv_conv_01',
        'mpv_si_02',
        'mpv_conv_02',
        'mpv_si_03',
        'mpv_conv_03',
        'mpv_01_rem',
        'mpv_02_rem',
        'mpv_03_rem',
        'neu_si_01',
        'neu_conv_01',
        'neu_si_02',
        'neu_conv_02',
        'neu_si_03',
        'neu_conv_03',
        'neu_01_rem',
        'neu_02_rem',
        'neu_03_rem',
        'lymph_si_01',
        'lymph_conv_01',
        'lymph_si_02',
        'lymph_conv_02',
        'lymph_si_03',
        'lymph_conv_03',
        'lymph_01_rem',
        'lymph_02_rem',
        'lymph_03_rem',
        'mono_si_01',
        'mono_conv_01',
        'mono_si_02',
        'mono_conv_02',
        'mono_si_03',
        'mono_conv_03',
        'mono_01_rem',
        'mono_02_rem',
        'mono_03_rem',
        'eos_si_01',
        'eos_conv_01',
        'eos_si_02',
        'eos_conv_02',
        'eos_si_03',
        'eos_conv_03',
        'eos_01_rem',
        'eos_02_rem',
        'eos_03_rem',
        'baso_si_01',
        'baso_conv_01',
        'baso_si_02',
        'baso_conv_02',
        'baso_si_03',
        'baso_conv_03',
        'baso_01_rem',
        'baso_02_rem',
        'baso_03_rem',
        'fbs_si_01',
        'fbs_conv_01',
        'fbs_si_02',
        'fbs_conv_02',
        'fbs_si_03',
        'fbs_conv_03',
        'fbs_01_rem',
        'fbs_02_rem',
        'fbs_03_rem',
        'choles_si_01',
        'choles_conv_01',
        'choles_si_02',
        'choles_conv_02',
        'choles_si_03',
        'choles_conv_03',
        'choles_01_rem',
        'choles_02_rem',
        'choles_03_rem',
        'trig_si_01',
        'trig_conv_01',
        'trig_si_02',
        'trig_conv_02',
        'trig_si_03',
        'trig_conv_03',
        'trig_01_rem',
        'trig_02_rem',
        'trig_03_rem',
        'hdl_si_01',
        'hdl_conv_01',
        'hdl_si_02',
        'hdl_conv_02',
        'hdl_si_03',
        'hdl_conv_03',
        'hdl_01_rem',
        'hdl_02_rem',
        'hdl_03_rem',
        'ldl_si_01',
        'ldl_conv_01',
        'ldl_si_02',
        'ldl_conv_02',
        'ldl_si_03',
        'ldl_conv_03',
        'ldl_01_rem',
        'ldl_02_rem',
        'ldl_03_rem',
        'vldl_si_01',
        'vldl_conv_01',
        'vldl_si_02',
        'vldl_conv_02',
        'vldl_si_03',
        'vldl_conv_03',
        'vldl_01_rem',
        'vldl_02_rem',
        'vldl_03_rem',
        'cholhdl_si_01',
        'cholhdl_conv_01',
        'cholhdl_si_02',
        'cholhdl_conv_02',
        'cholhdl_si_03',
        'cholhdl_conv_03',
        'cholhdl_01_rem',
        'cholhdl_02_rem',
        'cholhdl_03_rem',
        'sgpt_si_01',
        'sgpt_conv_01',
        'sgpt_si_02',
        'sgpt_conv_02',
        'sgpt_si_03',
        'sgpt_conv_03',
        'sgpt_01_rem',
        'sgpt_02_rem',
        'sgpt_03_rem',
        'sgot_si_01',
        'sgot_conv_01',
        'sgot_si_02',
        'sgot_conv_02',
        'sgot_si_03',
        'sgot_conv_03',
        'sgot_01_rem',
        'sgot_02_rem',
        'sgot_03_rem',
        'crp_01',
        'crp_02',
        'crp_03',
        'crp_01_rem',
        'crp_02_rem',
        'crp_03_rem',
        'cd4_01',
        'cd4_02',
        'cd4_03',
        'cd4_rem_01',
        'cd4_rem_02',
        'cd4_rem_03',
        'add_rt_01',
        'add_rt_02',
        'add_rt_03',
        'add_rt_res_01',
        'add_rt_res_02',
        'add_rt_res_03',
        'add_igg_01',
        'add_igg_02',
        'add_igg_03',
        'add_igg_res_01',
        'add_igg_res_02',
        'add_igg_res_03',
        'add_igm_01',
        'add_igm_02',
        'add_igm_03',
        'add_igm_res_01',
        'add_igm_res_02',
        'add_igm_res_03',
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
