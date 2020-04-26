<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 10)->index();
            $table->string('mon_day', 4);
            $table->string('mon_date', 20)->nullable();
            $table->string('mon_temp', 10)->nullable();
            $table->tinyInteger('mon_chills')->default('0')->nullable();
            $table->tinyInteger('mon_conjunct')->default('0')->nullable();
            $table->tinyInteger('mon_cough')->default('0')->nullable();
            $table->tinyInteger('mon_diarrhea')->default('0')->nullable();
            $table->tinyInteger('mon_runny')->default('0')->nullable();
            $table->tinyInteger('mon_breath')->default('0')->nullable();
            $table->tinyInteger('mon_throat')->default('0')->nullable();
            $table->tinyInteger('mon_appetite')->default('0')->nullable();
            $table->tinyInteger('mon_smell')->default('0')->nullable();
            $table->tinyInteger('mon_confusion')->default('0')->nullable();
            $table->tinyInteger('mon_seizures')->default('0')->nullable();
            $table->tinyInteger('mon_vomiting')->default('0')->nullable();
            $table->tinyInteger('mon_muscle_pain')->default('0')->nullable();
            $table->tinyInteger('mon_chest_pain')->default('0')->nullable();
            $table->tinyInteger('mon_other')->default('0')->nullable();
            $table->string('mon_other_note', 250)->nullable();
            $table->string('encoded_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['participant_id', 'mon_day']);
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
        Schema::dropIfExists('monitoring_data');
    }
}
