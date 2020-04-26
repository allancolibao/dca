<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 10)->index();
            $table->string('record_date', 20);
            $table->string('record_day', 10)->nullable();
            $table->string('accom_by', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->string('date', 20)->nullable();
            $table->string('encoded_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['participant_id', 'record_date']);
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
        Schema::dropIfExists('record_headers');
    }
}
