<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_header', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 20)->unique();
            $table->string('center_name', 250)->nullable();
            $table->string('center_address', 250)->nullable();
            $table->string('date_fill', 20)->nullable();
            $table->string('date_enroll', 20)->nullable();
            $table->string('date_withdraw', 20)->nullable();
            $table->string('completed_by', 50)->nullable();
            $table->string('date_completed', 20)->nullable();
            $table->string('position', 50)->nullable();
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
        Schema::dropIfExists('monitoring_header');
    }
}
