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
            $table->tinyInteger('sec_01_19_01')->default('0')->nullable();
            $table->tinyInteger('sec_01_19_02')->default('0')->nullable();
            $table->tinyInteger('sec_01_19_03')->default('0')->nullable();
            $table->string('sec_01_19_03_temp', 20)->nullable();
            $table->tinyInteger('sec_01_19_04')->default('0')->nullable();
            $table->tinyInteger('sec_01_19_05')->default('0')->nullable();
            $table->string('sec_01_19_06', 99)->nullable();
            $table->string('sec_02_anthrop_01', 20)->nullable();
            $table->string('sec_02_anthrop_02', 20)->nullable();
            $table->string('sec_02_anthrop_03', 20)->nullable();
            $table->string('sec_02_01_01', 20)->nullable();
            $table->string('sec_02_01_02', 20)->nullable();
            $table->string('sec_02_01_03', 20)->nullable();
            $table->string('sec_02_02_01', 20)->nullable();
            $table->string('sec_02_02_02', 20)->nullable();
            $table->string('sec_02_02_03', 20)->nullable();
            $table->string('sec_02_03_01', 20)->nullable();
            $table->string('sec_02_03_02', 20)->nullable();
            $table->string('sec_02_03_03', 20)->nullable();
            $table->string('sec_02_anthrop_rem_01', 99)->nullable();
            $table->string('sec_02_anthrop_rem_02', 99)->nullable();
            $table->string('sec_02_anthrop_rem_03', 99)->nullable();
            $table->string('sec_02_dia_01', 20)->nullable();
            $table->string('sec_02_dia_02', 20)->nullable();
            $table->string('sec_02_dia_03', 20)->nullable();
            $table->string('sec_02_04_01', 20)->nullable();
            $table->string('sec_02_04_02', 20)->nullable();
            $table->string('sec_02_04_03', 20)->nullable();
            $table->string('sec_02_dia_rem_01', 99)->nullable();
            $table->string('sec_02_dia_rem_02', 99)->nullable();
            $table->string('sec_02_dia_rem_03', 99)->nullable();
            $table->string('sec_02_lipid_01', 20)->nullable();
            $table->string('sec_02_lipid_02', 20)->nullable();
            $table->string('sec_02_lipid_03', 20)->nullable();
            $table->string('sec_02_05_01', 20)->nullable();
            $table->string('sec_02_05_02', 20)->nullable();
            $table->string('sec_02_05_03', 20)->nullable();
            $table->string('sec_02_05_01_rem', 50)->nullable();
            $table->string('sec_02_05_02_rem', 50)->nullable();
            $table->string('sec_02_05_03_rem', 50)->nullable();
            $table->string('sec_02_06_01', 20)->nullable();
            $table->string('sec_02_06_02', 20)->nullable();
            $table->string('sec_02_06_03', 20)->nullable();
            $table->string('sec_02_06_01_rem', 50)->nullable();
            $table->string('sec_02_06_02_rem', 50)->nullable();
            $table->string('sec_02_06_03_rem', 50)->nullable();
            $table->string('sec_02_07_01', 20)->nullable();
            $table->string('sec_02_07_02', 20)->nullable();
            $table->string('sec_02_07_03', 20)->nullable();
            $table->string('sec_02_lipid_rem_01', 99)->nullable();
            $table->string('sec_02_lipid_rem_02', 99)->nullable();
            $table->string('sec_02_lipid_rem_03', 99)->nullable();
            $table->string('sec_02_liver_01', 20)->nullable();
            $table->string('sec_02_liver_02', 20)->nullable();
            $table->string('sec_02_liver_03', 20)->nullable();
            $table->string('sec_02_08_01', 20)->nullable();
            $table->string('sec_02_08_02', 20)->nullable();
            $table->string('sec_02_08_03', 20)->nullable();
            $table->string('sec_02_08_01_rem', 50)->nullable();
            $table->string('sec_02_08_02_rem', 50)->nullable();
            $table->string('sec_02_08_03_rem', 50)->nullable();
            $table->string('sec_02_09_01', 20)->nullable();
            $table->string('sec_02_09_02', 20)->nullable();
            $table->string('sec_02_09_03', 20)->nullable();
            $table->string('sec_02_liver_rem_01', 99)->nullable();
            $table->string('sec_02_liver_rem_02', 99)->nullable();
            $table->string('sec_02_liver_rem_03', 99)->nullable();
            $table->string('sec_02_cli_01', 20)->nullable();
            $table->string('sec_02_cli_02', 20)->nullable();
            $table->string('sec_02_cli_03', 20)->nullable();
            $table->string('sec_02_10_01', 20)->nullable();
            $table->string('sec_02_10_02', 20)->nullable();
            $table->string('sec_02_10_03', 20)->nullable();
            $table->string('sec_02_10_01_rem', 50)->nullable();
            $table->string('sec_02_10_02_rem', 50)->nullable();
            $table->string('sec_02_10_03_rem', 50)->nullable();
            $table->string('sec_02_11_01', 20)->nullable();
            $table->string('sec_02_11_02', 20)->nullable();
            $table->string('sec_02_11_03', 20)->nullable();
            $table->string('sec_02_11_01_rem', 50)->nullable();
            $table->string('sec_02_11_02_rem', 50)->nullable();
            $table->string('sec_02_11_03_rem', 50)->nullable();
            $table->string('sec_02_12_01', 20)->nullable();
            $table->string('sec_02_12_02', 20)->nullable();
            $table->string('sec_02_12_03', 20)->nullable();
            $table->string('sec_02_12_01_rem', 50)->nullable();
            $table->string('sec_02_12_02_rem', 50)->nullable();
            $table->string('sec_02_12_03_rem', 50)->nullable();
            $table->string('sec_02_13_01', 20)->nullable();
            $table->string('sec_02_13_02', 20)->nullable();
            $table->string('sec_02_13_03', 20)->nullable();
            $table->string('sec_02_13_01_rem', 50)->nullable();
            $table->string('sec_02_13_02_rem', 50)->nullable();
            $table->string('sec_02_13_03_rem', 50)->nullable();
            $table->string('sec_02_14_01', 20)->nullable();
            $table->string('sec_02_14_02', 20)->nullable();
            $table->string('sec_02_14_03', 20)->nullable();
            $table->string('sec_02_15_01', 20)->nullable();
            $table->string('sec_02_15_02', 20)->nullable();
            $table->string('sec_02_15_03', 20)->nullable();
            $table->string('sec_02_16_01', 20)->nullable();
            $table->string('sec_02_16_02', 20)->nullable();
            $table->string('sec_02_16_03', 20)->nullable();
            $table->string('sec_02_17_01', 20)->nullable();
            $table->string('sec_02_17_02', 20)->nullable();
            $table->string('sec_02_17_03', 20)->nullable();
            $table->string('sec_02_cli_rem_01', 99)->nullable();
            $table->string('sec_02_cli_rem_02', 99)->nullable();
            $table->string('sec_02_cli_rem_03', 99)->nullable();
            $table->string('sec_02_sign_01', 20)->nullable();
            $table->string('sec_02_sign_02', 20)->nullable();
            $table->string('sec_02_sign_03', 20)->nullable();
            $table->string('sec_02_cough_01', 50)->nullable();
            $table->string('sec_02_cough_02', 50)->nullable();
            $table->string('sec_02_cough_03', 50)->nullable();
            $table->string('sec_02_breath_01', 50)->nullable();
            $table->string('sec_02_breath_02', 50)->nullable();
            $table->string('sec_02_breath_03', 50)->nullable();
            $table->string('sec_02_fever_01', 50)->nullable();
            $table->string('sec_02_fever_02', 50)->nullable();
            $table->string('sec_02_fever_03', 50)->nullable();
            $table->string('sec_02_tiredness_01', 50)->nullable();
            $table->string('sec_02_tiredness_02', 50)->nullable();
            $table->string('sec_02_tiredness_03', 50)->nullable();
            $table->string('sec_02_diarrhea_01', 50)->nullable();
            $table->string('sec_02_diarrhea_02', 50)->nullable();
            $table->string('sec_02_diarrhea_03', 50)->nullable();
            $table->string('sec_02_oth_01', 50)->nullable();
            $table->string('sec_02_oth_01_01', 50)->nullable();
            $table->string('sec_02_oth_01_02', 50)->nullable();
            $table->string('sec_02_oth_01_03', 50)->nullable();
            $table->string('sec_02_oth_02', 50)->nullable();
            $table->string('sec_02_oth_02_01', 50)->nullable();
            $table->string('sec_02_oth_02_02', 50)->nullable();
            $table->string('sec_02_oth_02_03', 50)->nullable();
            $table->string('sec_02_oth_03', 50)->nullable();
            $table->string('sec_02_oth_03_01', 50)->nullable();
            $table->string('sec_02_oth_03_02', 50)->nullable();
            $table->string('sec_02_oth_03_03', 50)->nullable();
            $table->string('sec_02_oth_04', 50)->nullable();
            $table->string('sec_02_oth_04_01', 50)->nullable();
            $table->string('sec_02_oth_04_02', 50)->nullable();
            $table->string('sec_02_oth_04_03', 50)->nullable();
            $table->string('sec_02_oth_05', 50)->nullable();
            $table->string('sec_02_oth_05_01', 50)->nullable();
            $table->string('sec_02_oth_05_02', 50)->nullable();
            $table->string('sec_02_oth_05_03', 50)->nullable();
            $table->string('sec_add_rt_01', 50)->nullable();
            $table->string('sec_add_rt_02', 50)->nullable();
            $table->string('sec_add_rt_03', 50)->nullable();
            $table->string('sec_add_rt_res_01', 50)->nullable();
            $table->string('sec_add_rt_res_02', 50)->nullable();
            $table->string('sec_add_rt_res_03', 50)->nullable();
            $table->string('sec_add_igm_01', 50)->nullable();
            $table->string('sec_add_igm_02', 50)->nullable();
            $table->string('sec_add_igm_03', 50)->nullable();
            $table->string('sec_add_igm_res_01', 50)->nullable();
            $table->string('sec_add_igm_res_02', 50)->nullable();
            $table->string('sec_add_igm_res_03', 50)->nullable();
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
