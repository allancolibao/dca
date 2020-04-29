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
            $table->string('participant_id', 10)->unique();
            $table->string('officer_name', 50)->nullable();
            $table->string('date_accomplished', 20)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->tinyInteger('is_identified_sus')->default('0')->nullable();
            $table->tinyInteger('is_identified_prob')->default('0')->nullable();
            $table->string('sec_02_01', 10)->nullable();
            $table->string('sec_02_02', 15)->nullable();
            $table->string('sec_02_03', 10)->nullable();
            $table->tinyInteger('sec_02_04')->default('0')->nullable();
            $table->tinyInteger('sec_02_05')->default('0')->nullable();
            $table->tinyInteger('sec_02_06')->default('0')->nullable();
            $table->tinyInteger('sec_02_07')->default('0')->nullable();
            $table->tinyInteger('sec_02_08')->default('0')->nullable();
            $table->string('sec_02_09', 50)->nullable();
            $table->tinyInteger('sec_02_10')->default('0')->nullable();
            $table->string('sec_02_10_01', 30)->nullable();
            $table->tinyInteger('sec_02_11')->default('0')->nullable();
            $table->tinyInteger('sec_02_12')->default('0')->nullable();
            $table->tinyInteger('sec_02_13')->default('0')->nullable();
            $table->tinyInteger('sec_02_14')->default('0')->nullable();
            $table->tinyInteger('sec_02_15')->default('0')->nullable();
            $table->tinyInteger('sec_02_16')->default('0')->nullable();
            $table->tinyInteger('sec_02_17')->default('0')->nullable();
            $table->tinyInteger('sec_02_18')->default('0')->nullable();
            $table->tinyInteger('sec_02_19')->default('0')->nullable();
            $table->tinyInteger('sec_02_20')->default('0')->nullable();
            $table->string('sec_02_20_01', 250)->nullable();
            $table->string('sec_02_21', 250)->nullable();
            $table->string('sec_02_22', 250)->nullable();
            $table->string('sec_03_01', 250)->nullable();
            $table->tinyInteger('sec_03_02')->default('0')->nullable();
            $table->string('sec_03_02_01', 250)->nullable();
            $table->tinyInteger('sec_03_03')->default('0')->nullable();
            $table->string('sec_03_03_01', 250)->nullable();
            $table->tinyInteger('sec_03_04')->default('0')->nullable();
            $table->string('sec_03_04_01', 250)->nullable();
            $table->string('sec_04_01_01', 10)->nullable();
            $table->string('sec_04_01_02', 10)->nullable();
            $table->string('sec_04_01_03', 10)->nullable();
            $table->string('sec_04_02_01', 10)->nullable();
            $table->string('sec_04_02_02', 10)->nullable();
            $table->string('sec_04_02_03', 10)->nullable();
            $table->float('sec_04_03', 6, 4)->nullable();
            $table->string('sec_04_03_01', 25)->nullable();
            $table->string('sec_05_01_01', 10)->nullable();
            $table->string('sec_05_01_02', 50)->nullable();
            $table->string('sec_05_02_01', 10)->nullable();
            $table->string('sec_05_02_02', 50)->nullable();
            $table->string('sec_05_03_01', 10)->nullable();
            $table->string('sec_05_03_02', 50)->nullable();
            $table->string('sec_05_04_01', 10)->nullable();
            $table->string('sec_05_04_02', 50)->nullable();
            $table->string('sec_05_05_01', 10)->nullable();
            $table->string('sec_05_05_02', 50)->nullable();
            $table->string('sec_05_06_01', 10)->nullable();
            $table->string('sec_05_06_02', 50)->nullable();
            $table->string('sec_05_07_01', 10)->nullable();
            $table->string('sec_05_07_02', 50)->nullable();
            $table->string('sec_05_08_01', 10)->nullable();
            $table->string('sec_05_08_02', 50)->nullable();
            $table->string('sec_05_09_01', 10)->nullable();
            $table->string('sec_05_09_02', 50)->nullable();
            $table->string('sec_05_10_01', 10)->nullable();
            $table->string('sec_05_10_02', 50)->nullable();
            $table->string('sec_05_cd4_01', 10)->nullable();
            $table->string('sec_05_cd4_02', 50)->nullable();
            $table->string('sec_05_vl_01', 10)->nullable();
            $table->string('sec_05_vl_02', 50)->nullable();
            $table->string('sec_05_lx_01', 10)->nullable();
            $table->string('sec_05_lx_02', 50)->nullable();
            $table->string('sec_06_01', 10)->nullable();
            $table->string('sec_06_02', 50)->nullable();
            $table->string('sec_06_03', 250)->nullable();
            $table->string('sec_06_04', 250)->nullable();
            $table->tinyInteger('is_fit')->default('0')->nullable();
            $table->string('physician_name', 50)->nullable();
            $table->string('physician_license', 50)->nullable();
            $table->string('physician_date', 20)->nullable();
            $table->tinyInteger('is_eligible')->default('0')->nullable();
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
