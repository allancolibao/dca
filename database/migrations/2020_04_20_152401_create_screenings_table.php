<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 20)->unique();
            $table->string('officer_name', 50)->nullable();
            $table->string('date_accomplished', 20)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->tinyInteger('is_identified_symp')->default('0')->nullable();
            $table->tinyInteger('is_identified_asymp')->default('0')->nullable();
            $table->tinyInteger('is_confirmed')->default('0')->nullable();
            $table->string('sec_02_01', 20)->nullable();
            $table->string('sec_02_02', 15)->nullable();
            $table->string('sec_02_03', 20)->nullable();
            $table->tinyInteger('sec_02_04')->default('0')->nullable();
            $table->tinyInteger('sec_02_05')->default('0')->nullable();
            $table->tinyInteger('sec_02_06')->default('0')->nullable();
            $table->tinyInteger('sec_02_07')->default('0')->nullable();
            $table->tinyInteger('sec_02_08')->default('0')->nullable();
            $table->string('sec_02_09', 50)->nullable();

            $table->string('sec_02_10_symp_01', 50)->nullable();
            $table->string('sec_02_10_symp_01_date', 20)->nullable();

            $table->string('sec_02_10_symp_02', 50)->nullable();
            $table->string('sec_02_10_symp_02_date', 20)->nullable();

            $table->string('sec_02_10_symp_03', 50)->nullable();
            $table->string('sec_02_10_symp_03_date', 20)->nullable();

            $table->string('sec_02_10_symp_04', 50)->nullable();
            $table->string('sec_02_10_symp_04_date', 20)->nullable();

            $table->string('sec_02_10_symp_05', 50)->nullable();
            $table->string('sec_02_10_symp_05_date', 20)->nullable();

            $table->string('sec_02_10_symp_06', 50)->nullable();
            $table->string('sec_02_10_symp_06_date', 20)->nullable();
            

            $table->tinyInteger('sec_02_11')->default('0')->nullable();
            $table->string('sec_02_11_01', 30)->nullable();
            $table->tinyInteger('sec_02_12')->default('0')->nullable();
            $table->tinyInteger('sec_02_13')->default('0')->nullable();
            $table->tinyInteger('sec_02_14')->default('0')->nullable();
            $table->tinyInteger('sec_02_15')->default('0')->nullable();
            $table->tinyInteger('sec_02_16')->default('0')->nullable();
            $table->tinyInteger('sec_02_17')->default('0')->nullable();
            $table->tinyInteger('sec_02_18')->default('0')->nullable();
            $table->tinyInteger('sec_02_19')->default('0')->nullable();
            $table->tinyInteger('sec_02_20')->default('0')->nullable();
            $table->tinyInteger('sec_02_21')->default('0')->nullable();
            $table->string('sec_02_21_01', 250)->nullable();
            $table->string('sec_02_22', 250)->nullable();
            $table->string('sec_02_23', 250)->nullable();
            $table->string('sec_03_01', 250)->nullable();
            $table->tinyInteger('sec_03_02')->default('0')->nullable();
            $table->string('sec_03_02_01', 250)->nullable();
            $table->tinyInteger('sec_03_03')->default('0')->nullable();
            $table->string('sec_03_03_01', 250)->nullable();
            $table->tinyInteger('sec_03_04')->default('0')->nullable();
            $table->string('sec_03_04_01', 250)->nullable();
            $table->string('sec_04_01_01', 20)->nullable();
            $table->string('sec_04_01_02', 20)->nullable();
            $table->string('sec_04_01_03', 20)->nullable();
            $table->string('sec_04_02_01', 20)->nullable();
            $table->string('sec_04_02_02', 20)->nullable();
            $table->string('sec_04_02_03', 20)->nullable();
            $table->float('sec_04_03', 6, 4)->nullable();
            $table->string('sec_04_03_01', 25)->nullable();
            
            $table->string('wbc_si_01', 50)->nullable();
            $table->string('wbc_conv_01', 50)->nullable();
            $table->string('wbc_01_rem', 50)->nullable();
          

            $table->string('rbc_si_01', 50)->nullable();
            $table->string('rbc_conv_01', 50)->nullable();
            $table->string('rbc_01_rem', 50)->nullable();
           

            $table->string('hemo_si_01', 50)->nullable();
            $table->string('hemo_conv_01', 50)->nullable();
            $table->string('hemo_01_rem', 50)->nullable();
          

            $table->string('hema_si_01', 50)->nullable();
            $table->string('hema_conv_01', 50)->nullable();
            $table->string('hema_01_rem', 50)->nullable();
           

            $table->string('mcv_si_01', 50)->nullable();
            $table->string('mcv_conv_01', 50)->nullable();
            $table->string('mcv_01_rem', 50)->nullable();
            

            $table->string('mch_si_01', 50)->nullable();
            $table->string('mch_conv_01', 50)->nullable();
            $table->string('mch_01_rem', 50)->nullable();
           

            $table->string('mchc_si_01', 50)->nullable();
            $table->string('mchc_conv_01', 50)->nullable();
            $table->string('mchc_01_rem', 50)->nullable();
           

            $table->string('rdw_si_01', 50)->nullable();
            $table->string('rdw_conv_01', 50)->nullable();
            $table->string('rdw_01_rem', 50)->nullable();
         

            $table->string('pc_si_01', 50)->nullable();
            $table->string('pc_conv_01', 50)->nullable();
            $table->string('pc_01_rem', 50)->nullable();


            $table->string('mpv_si_01', 50)->nullable();
            $table->string('mpv_conv_01', 50)->nullable();
            $table->string('mpv_01_rem', 50)->nullable();

            $table->string('neu_si_01', 50)->nullable();
            $table->string('neu_conv_01', 50)->nullable();
            $table->string('neu_01_rem', 50)->nullable();
           

            $table->string('lymph_si_01', 50)->nullable();
            $table->string('lymph_conv_01', 50)->nullable();
            $table->string('lymph_01_rem', 50)->nullable();
         

            $table->string('mono_si_01', 50)->nullable();
            $table->string('mono_conv_01', 50)->nullable();
            $table->string('mono_01_rem', 50)->nullable();
           

            $table->string('eos_si_01', 50)->nullable();
            $table->string('eos_conv_01', 50)->nullable();
            $table->string('eos_01_rem', 50)->nullable();
       

            $table->string('baso_si_01', 50)->nullable();
            $table->string('baso_conv_01', 50)->nullable();
            $table->string('baso_01_rem', 50)->nullable();
          

            $table->string('fbs_si_01', 50)->nullable();
            $table->string('fbs_conv_01', 50)->nullable();
            $table->string('fbs_01_rem', 50)->nullable();
         

            $table->string('choles_si_01', 50)->nullable();
            $table->string('choles_conv_01', 50)->nullable();
            $table->string('choles_01_rem', 50)->nullable();
          

            $table->string('trig_si_01', 50)->nullable();
            $table->string('trig_conv_01', 50)->nullable();
            $table->string('trig_01_rem', 50)->nullable();
         

            $table->string('hdl_si_01', 50)->nullable();
            $table->string('hdl_conv_01', 50)->nullable();
            $table->string('hdl_01_rem', 50)->nullable();
        

            $table->string('ldl_si_01', 50)->nullable();
            $table->string('ldl_conv_01', 50)->nullable();
            $table->string('ldl_01_rem', 50)->nullable();
         

            $table->string('vldl_si_01', 50)->nullable();
            $table->string('vldl_conv_01', 50)->nullable();
            $table->string('vldl_01_rem', 50)->nullable();
           

            $table->string('cholhdl_si_01', 50)->nullable();
            $table->string('cholhdl_conv_01', 50)->nullable();
            $table->string('cholhdl_01_rem', 50)->nullable();
        

            $table->string('sgpt_si_01', 50)->nullable();
            $table->string('sgpt_conv_01', 50)->nullable();
            $table->string('sgpt_01_rem', 50)->nullable();
           

            $table->string('sgot_si_01', 50)->nullable();
            $table->string('sgot_conv_01', 50)->nullable();
            $table->string('sgot_01_rem', 50)->nullable();
          

            $table->string('crp_01', 50)->nullable();
            $table->string('crp_01_rem', 50)->nullable();
          
            $table->string('cd4_01', 50)->nullable();
            $table->string('cd4_rem_01', 50)->nullable();

            $table->string('sec_06_01_sys', 20)->nullable();
            $table->string('sec_06_01_dias', 20)->nullable();

            $table->string('sec_06_02', 50)->nullable();
            $table->string('sec_06_03', 250)->nullable();
            $table->string('sec_06_04', 250)->nullable();
            $table->tinyInteger('is_fit')->default('0')->nullable();
            $table->string('physician_name', 50)->nullable();
            $table->string('physician_license', 50)->nullable();
            $table->string('physician_date', 20)->nullable();
            $table->string('is_eligible', 20)->nullable();
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
        Schema::dropIfExists('screenings');
    }
}
