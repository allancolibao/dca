<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdverseEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverse_event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 10)->unique();
            $table->tinyInteger('ae_serious')->default('0')->nullable();
            $table->tinyInteger('ae_unexpected')->default('0')->nullable();
            $table->tinyInteger('ae_related')->default('0')->nullable();
            $table->tinyInteger('ae_occurring')->default('0')->nullable();
            $table->tinyInteger('ae_01_physician')->default('0')->nullable();
            $table->tinyInteger('ae_01_nurse')->default('0')->nullable();
            $table->tinyInteger('ae_01_rnd')->default('0')->nullable();
            $table->tinyInteger('ae_02')->default('0')->nullable();
            $table->tinyInteger('ae_03')->default('0')->nullable();
            $table->tinyInteger('ae_04')->default('0')->nullable();
            $table->tinyInteger('ae_05')->default('0')->nullable();
            $table->string('ae_05_action', 250)->nullable();
            $table->string('ae_05_urgency', 250)->nullable();
            $table->tinyInteger('ae_06')->default('0')->nullable();
            $table->tinyInteger('ae_07')->default('0')->nullable();
            $table->string('ae_08', 250)->nullable();
            $table->tinyInteger('ae_09')->default('0')->nullable();
            $table->tinyInteger('ae_rel_physician')->default('0')->nullable();
            $table->tinyInteger('ae_rel_nurse')->default('0')->nullable();
            $table->tinyInteger('ae_rel_rnd')->default('0')->nullable();
            $table->tinyInteger('ae_10')->default('0')->nullable();
            $table->tinyInteger('ae_11')->default('0')->nullable();
            $table->tinyInteger('ae_12')->default('0')->nullable();
            $table->tinyInteger('ae_13')->default('0')->nullable();
            $table->string('ae_13_01', 250)->nullable();
            $table->tinyInteger('ae_14')->default('0')->nullable();
            $table->string('ae_date', 20)->nullable();
            $table->string('ae_name', 50)->nullable();
            $table->string('ae_contact_person', 50)->nullable();
            $table->string('ae_email', 50)->nullable();
            $table->string('ae_title', 50)->nullable();
            $table->text('ae_15_01')->nullable();
            $table->text('ae_15_02')->nullable();
            $table->string('ae_15_principal', 50)->nullable();
            $table->string('ae_15_date', 20)->nullable();
            $table->string('ae_16_name', 50)->nullable();
            $table->string('ae_16_date', 20)->nullable();
            $table->tinyInteger('ae_16')->default('0')->nullable();
            $table->text('ae_16_comment')->nullable();
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
        Schema::dropIfExists('adverse_event');
    }
}
