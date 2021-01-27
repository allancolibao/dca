<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 20)->unique();
            $table->string('date_admitted', 20)->nullable();
            $table->string('date_accomplished', 20)->nullable();
            $table->string('officer_name', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->string('baseline_date', 20)->nullable();
            $table->string('midline_date', 20)->nullable();
            $table->string('endline_date', 20)->nullable();
            $table->string('dry_cough_01', 50)->nullable();
            $table->string('dry_cough_02', 50)->nullable();
            $table->string('dry_cough_03', 50)->nullable();
            $table->string('breath_diff_01', 50)->nullable();
            $table->string('breath_diff_02', 50)->nullable();
            $table->string('breath_diff_03', 50)->nullable();
            $table->string('fever_01', 50)->nullable();
            $table->string('fever_02', 50)->nullable();
            $table->string('fever_03', 50)->nullable();
            $table->string('tiredness_01', 50)->nullable();
            $table->string('tiredness_02', 50)->nullable();
            $table->string('tiredness_03', 50)->nullable();
            $table->string('diarrhea_01', 50)->nullable();
            $table->string('diarrhea_02', 50)->nullable();
            $table->string('diarrhea_03', 50)->nullable();
            $table->string('sign_oth_01', 50)->nullable();
            $table->string('sign_oth_01_01', 50)->nullable();
            $table->string('sign_oth_01_02', 50)->nullable();
            $table->string('sign_oth_01_03', 50)->nullable();
            $table->string('sign_oth_02', 50)->nullable();
            $table->string('sign_oth_02_01', 50)->nullable();
            $table->string('sign_oth_02_02', 50)->nullable();
            $table->string('sign_oth_02_03', 50)->nullable();
            $table->string('sign_oth_03', 50)->nullable();
            $table->string('sign_oth_03_01', 50)->nullable();
            $table->string('sign_oth_03_02', 50)->nullable();
            $table->string('sign_oth_03_03', 50)->nullable();
            $table->string('sign_oth_04', 50)->nullable();
            $table->string('sign_oth_04_01', 50)->nullable();
            $table->string('sign_oth_04_02', 50)->nullable();
            $table->string('sign_oth_04_03', 50)->nullable();
            $table->string('sign_oth_05', 50)->nullable();
            $table->string('sign_oth_05_01', 50)->nullable();
            $table->string('sign_oth_05_02', 50)->nullable();
            $table->string('sign_oth_05_03', 50)->nullable();
            $table->string('weight_01', 50)->nullable();
            $table->string('weight_02', 50)->nullable();
            $table->string('weight_03', 50)->nullable();
            $table->string('height_01', 50)->nullable();
            $table->string('height_02', 50)->nullable();
            $table->string('height_03', 50)->nullable();
            $table->string('bmi_01', 50)->nullable();
            $table->string('bmi_02', 50)->nullable();
            $table->string('bmi_03', 50)->nullable();
            $table->string('bmi_rem_01', 50)->nullable();
            $table->string('bmi_rem_02', 50)->nullable();
            $table->string('bmi_rem_03', 50)->nullable();

            $table->string('wbc_si_01', 50)->nullable();
            $table->string('wbc_conv_01', 50)->nullable();
            $table->string('wbc_si_02', 50)->nullable();
            $table->string('wbc_conv_02', 50)->nullable();
            $table->string('wbc_si_03', 50)->nullable();
            $table->string('wbc_conv_03', 50)->nullable();
            $table->string('wbc_01_rem', 50)->nullable();
            $table->string('wbc_02_rem', 50)->nullable();
            $table->string('wbc_03_rem', 50)->nullable();

            $table->string('rbc_si_01', 50)->nullable();
            $table->string('rbc_conv_01', 50)->nullable();
            $table->string('rbc_si_02', 50)->nullable();
            $table->string('rbc_conv_02', 50)->nullable();
            $table->string('rbc_si_03', 50)->nullable();
            $table->string('rbc_conv_03', 50)->nullable();
            $table->string('rbc_01_rem', 50)->nullable();
            $table->string('rbc_02_rem', 50)->nullable();
            $table->string('rbc_03_rem', 50)->nullable();

            $table->string('hemo_si_01', 50)->nullable();
            $table->string('hemo_conv_01', 50)->nullable();
            $table->string('hemo_si_02', 50)->nullable();
            $table->string('hemo_conv_02', 50)->nullable();
            $table->string('hemo_si_03', 50)->nullable();
            $table->string('hemo_conv_03', 50)->nullable();
            $table->string('hemo_01_rem', 50)->nullable();
            $table->string('hemo_02_rem', 50)->nullable();
            $table->string('hemo_03_rem', 50)->nullable();

            $table->string('hema_si_01', 50)->nullable();
            $table->string('hema_conv_01', 50)->nullable();
            $table->string('hema_si_02', 50)->nullable();
            $table->string('hema_conv_02', 50)->nullable();
            $table->string('hema_si_03', 50)->nullable();
            $table->string('hema_conv_03', 50)->nullable();
            $table->string('hema_01_rem', 50)->nullable();
            $table->string('hema_02_rem', 50)->nullable();
            $table->string('hema_03_rem', 50)->nullable();

            $table->string('mcv_si_01', 50)->nullable();
            $table->string('mcv_conv_01', 50)->nullable();
            $table->string('mcv_si_02', 50)->nullable();
            $table->string('mcv_conv_02', 50)->nullable();
            $table->string('mcv_si_03', 50)->nullable();
            $table->string('mcv_conv_03', 50)->nullable();
            $table->string('mcv_01_rem', 50)->nullable();
            $table->string('mcv_02_rem', 50)->nullable();
            $table->string('mcv_03_rem', 50)->nullable();

            $table->string('mch_si_01', 50)->nullable();
            $table->string('mch_conv_01', 50)->nullable();
            $table->string('mch_si_02', 50)->nullable();
            $table->string('mch_conv_02', 50)->nullable();
            $table->string('mch_si_03', 50)->nullable();
            $table->string('mch_conv_03', 50)->nullable();
            $table->string('mch_01_rem', 50)->nullable();
            $table->string('mch_02_rem', 50)->nullable();
            $table->string('mch_03_rem', 50)->nullable();

            $table->string('mchc_si_01', 50)->nullable();
            $table->string('mchc_conv_01', 50)->nullable();
            $table->string('mchc_si_02', 50)->nullable();
            $table->string('mchc_conv_02', 50)->nullable();
            $table->string('mchc_si_03', 50)->nullable();
            $table->string('mchc_conv_03', 50)->nullable();
            $table->string('mchc_01_rem', 50)->nullable();
            $table->string('mchc_02_rem', 50)->nullable();
            $table->string('mchc_03_rem', 50)->nullable();

            $table->string('rdw_si_01', 50)->nullable();
            $table->string('rdw_conv_01', 50)->nullable();
            $table->string('rdw_si_02', 50)->nullable();
            $table->string('rdw_conv_02', 50)->nullable();
            $table->string('rdw_si_03', 50)->nullable();
            $table->string('rdw_conv_03', 50)->nullable();
            $table->string('rdw_01_rem', 50)->nullable();
            $table->string('rdw_02_rem', 50)->nullable();
            $table->string('rdw_03_rem', 50)->nullable();

            $table->string('pc_si_01', 50)->nullable();
            $table->string('pc_conv_01', 50)->nullable();
            $table->string('pc_si_02', 50)->nullable();
            $table->string('pc_conv_02', 50)->nullable();
            $table->string('pc_si_03', 50)->nullable();
            $table->string('pc_conv_03', 50)->nullable();
            $table->string('pc_01_rem', 50)->nullable();
            $table->string('pc_02_rem', 50)->nullable();
            $table->string('pc_03_rem', 50)->nullable();

            $table->string('mpv_si_01', 50)->nullable();
            $table->string('mpv_conv_01', 50)->nullable();
            $table->string('mpv_si_02', 50)->nullable();
            $table->string('mpv_conv_02', 50)->nullable();
            $table->string('mpv_si_03', 50)->nullable();
            $table->string('mpv_conv_03', 50)->nullable();
            $table->string('mpv_01_rem', 50)->nullable();
            $table->string('mpv_02_rem', 50)->nullable();
            $table->string('mpv_03_rem', 50)->nullable();

            $table->string('neu_si_01', 50)->nullable();
            $table->string('neu_conv_01', 50)->nullable();
            $table->string('neu_si_02', 50)->nullable();
            $table->string('neu_conv_02', 50)->nullable();
            $table->string('neu_si_03', 50)->nullable();
            $table->string('neu_conv_03', 50)->nullable();
            $table->string('neu_01_rem', 50)->nullable();
            $table->string('neu_02_rem', 50)->nullable();
            $table->string('neu_03_rem', 50)->nullable();

            $table->string('lymph_si_01', 50)->nullable();
            $table->string('lymph_conv_01', 50)->nullable();
            $table->string('lymph_si_02', 50)->nullable();
            $table->string('lymph_conv_02', 50)->nullable();
            $table->string('lymph_si_03', 50)->nullable();
            $table->string('lymph_conv_03', 50)->nullable();
            $table->string('lymph_01_rem', 50)->nullable();
            $table->string('lymph_02_rem', 50)->nullable();
            $table->string('lymph_03_rem', 50)->nullable();

            $table->string('mono_si_01', 50)->nullable();
            $table->string('mono_conv_01', 50)->nullable();
            $table->string('mono_si_02', 50)->nullable();
            $table->string('mono_conv_02', 50)->nullable();
            $table->string('mono_si_03', 50)->nullable();
            $table->string('mono_conv_03', 50)->nullable();
            $table->string('mono_01_rem', 50)->nullable();
            $table->string('mono_02_rem', 50)->nullable();
            $table->string('mono_03_rem', 50)->nullable();

            $table->string('eos_si_01', 50)->nullable();
            $table->string('eos_conv_01', 50)->nullable();
            $table->string('eos_si_02', 50)->nullable();
            $table->string('eos_conv_02', 50)->nullable();
            $table->string('eos_si_03', 50)->nullable();
            $table->string('eos_conv_03', 50)->nullable();
            $table->string('eos_01_rem', 50)->nullable();
            $table->string('eos_02_rem', 50)->nullable();
            $table->string('eos_03_rem', 50)->nullable();

            $table->string('baso_si_01', 50)->nullable();
            $table->string('baso_conv_01', 50)->nullable();
            $table->string('baso_si_02', 50)->nullable();
            $table->string('baso_conv_02', 50)->nullable();
            $table->string('baso_si_03', 50)->nullable();
            $table->string('baso_conv_03', 50)->nullable();
            $table->string('baso_01_rem', 50)->nullable();
            $table->string('baso_02_rem', 50)->nullable();
            $table->string('baso_03_rem', 50)->nullable();

            $table->string('fbs_si_01', 50)->nullable();
            $table->string('fbs_conv_01', 50)->nullable();
            $table->string('fbs_si_02', 50)->nullable();
            $table->string('fbs_conv_02', 50)->nullable();
            $table->string('fbs_si_03', 50)->nullable();
            $table->string('fbs_conv_03', 50)->nullable();
            $table->string('fbs_01_rem', 50)->nullable();
            $table->string('fbs_02_rem', 50)->nullable();
            $table->string('fbs_03_rem', 50)->nullable();

            $table->string('choles_si_01', 50)->nullable();
            $table->string('choles_conv_01', 50)->nullable();
            $table->string('choles_si_02', 50)->nullable();
            $table->string('choles_conv_02', 50)->nullable();
            $table->string('choles_si_03', 50)->nullable();
            $table->string('choles_conv_03', 50)->nullable();
            $table->string('choles_01_rem', 50)->nullable();
            $table->string('choles_02_rem', 50)->nullable();
            $table->string('choles_03_rem', 50)->nullable();

            $table->string('trig_si_01', 50)->nullable();
            $table->string('trig_conv_01', 50)->nullable();
            $table->string('trig_si_02', 50)->nullable();
            $table->string('trig_conv_02', 50)->nullable();
            $table->string('trig_si_03', 50)->nullable();
            $table->string('trig_conv_03', 50)->nullable();
            $table->string('trig_01_rem', 50)->nullable();
            $table->string('trig_02_rem', 50)->nullable();
            $table->string('trig_03_rem', 50)->nullable();

            $table->string('hdl_si_01', 50)->nullable();
            $table->string('hdl_conv_01', 50)->nullable();
            $table->string('hdl_si_02', 50)->nullable();
            $table->string('hdl_conv_02', 50)->nullable();
            $table->string('hdl_si_03', 50)->nullable();
            $table->string('hdl_conv_03', 50)->nullable();
            $table->string('hdl_01_rem', 50)->nullable();
            $table->string('hdl_02_rem', 50)->nullable();
            $table->string('hdl_03_rem', 50)->nullable();

            $table->string('ldl_si_01', 50)->nullable();
            $table->string('ldl_conv_01', 50)->nullable();
            $table->string('ldl_si_02', 50)->nullable();
            $table->string('ldl_conv_02', 50)->nullable();
            $table->string('ldl_si_03', 50)->nullable();
            $table->string('ldl_conv_03', 50)->nullable();
            $table->string('ldl_01_rem', 50)->nullable();
            $table->string('ldl_02_rem', 50)->nullable();
            $table->string('ldl_03_rem', 50)->nullable();

            $table->string('vldl_si_01', 50)->nullable();
            $table->string('vldl_conv_01', 50)->nullable();
            $table->string('vldl_si_02', 50)->nullable();
            $table->string('vldl_conv_02', 50)->nullable();
            $table->string('vldl_si_03', 50)->nullable();
            $table->string('vldl_conv_03', 50)->nullable();
            $table->string('vldl_01_rem', 50)->nullable();
            $table->string('vldl_02_rem', 50)->nullable();
            $table->string('vldl_03_rem', 50)->nullable();

            $table->string('cholhdl_si_01', 50)->nullable();
            $table->string('cholhdl_conv_01', 50)->nullable();
            $table->string('cholhdl_si_02', 50)->nullable();
            $table->string('cholhdl_conv_02', 50)->nullable();
            $table->string('cholhdl_si_03', 50)->nullable();
            $table->string('cholhdl_conv_03', 50)->nullable();
            $table->string('cholhdl_01_rem', 50)->nullable();
            $table->string('cholhdl_02_rem', 50)->nullable();
            $table->string('cholhdl_03_rem', 50)->nullable();

            $table->string('sgpt_si_01', 50)->nullable();
            $table->string('sgpt_conv_01', 50)->nullable();
            $table->string('sgpt_si_02', 50)->nullable();
            $table->string('sgpt_conv_02', 50)->nullable();
            $table->string('sgpt_si_03', 50)->nullable();
            $table->string('sgpt_conv_03', 50)->nullable();
            $table->string('sgpt_01_rem', 50)->nullable();
            $table->string('sgpt_02_rem', 50)->nullable();
            $table->string('sgpt_03_rem', 50)->nullable();

            $table->string('sgot_si_01', 50)->nullable();
            $table->string('sgot_conv_01', 50)->nullable();
            $table->string('sgot_si_02', 50)->nullable();
            $table->string('sgot_conv_02', 50)->nullable();
            $table->string('sgot_si_03', 50)->nullable();
            $table->string('sgot_conv_03', 50)->nullable();
            $table->string('sgot_01_rem', 50)->nullable();
            $table->string('sgot_02_rem', 50)->nullable();
            $table->string('sgot_03_rem', 50)->nullable();

            $table->string('crp_01', 50)->nullable();
            $table->string('crp_02', 50)->nullable();
            $table->string('crp_03', 50)->nullable();
            $table->string('crp_01_rem', 50)->nullable();
            $table->string('crp_02_rem', 50)->nullable();
            $table->string('crp_03_rem', 50)->nullable();

            $table->string('cd4_01', 50)->nullable();
            $table->string('cd4_02', 50)->nullable();
            $table->string('cd4_03', 50)->nullable();
            $table->string('cd4_rem_01', 50)->nullable();
            $table->string('cd4_rem_02', 50)->nullable();
            $table->string('cd4_rem_03', 50)->nullable();

            $table->string('add_rt_01', 50)->nullable();
            $table->string('add_rt_02', 50)->nullable();
            $table->string('add_rt_03', 50)->nullable();
            $table->string('add_rt_res_01', 50)->nullable();
            $table->string('add_rt_res_02', 50)->nullable();
            $table->string('add_rt_res_03', 50)->nullable();
            $table->string('add_igg_01', 50)->nullable();
            $table->string('add_igg_02', 50)->nullable();
            $table->string('add_igg_03', 50)->nullable();
            $table->string('add_igg_res_01', 50)->nullable();
            $table->string('add_igg_res_02', 50)->nullable();
            $table->string('add_igg_res_03', 50)->nullable();
            $table->string('add_igm_01', 50)->nullable();
            $table->string('add_igm_02', 50)->nullable();
            $table->string('add_igm_03', 50)->nullable();
            $table->string('add_igm_res_01', 50)->nullable();
            $table->string('add_igm_res_02', 50)->nullable();
            $table->string('add_igm_res_03', 50)->nullable();


            $table->string('encoded_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('participant_id')->references('participant_id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_reports');
    }
}
