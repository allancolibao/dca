<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 10)->index();
            $table->string('record_date', 20);
            $table->string('line_no', 4);
            $table->string('food_item', 50)->nullable();
            $table->string('fi_amount_size', 50)->nullable();
            $table->string('plate_waste', 50)->nullable();
            $table->string('pw_amount_size', 50)->nullable();
            $table->string('rf_code', 4)->nullable();
            $table->string('meal_code', 4)->nullable();
            $table->string('food_code', 250)->nullable();
            $table->string('fic', 4)->nullable();
            $table->string('food_weight', 10)->nullable();
            $table->string('fw_rcc', 4)->nullable();
            $table->string('fw_cmc', 4)->nullable();
            $table->string('supply_code', 4)->nullable();
            $table->string('src_code', 4)->nullable();
            $table->string('pw_weight', 10)->nullable();
            $table->string('pw_rcc', 4)->nullable();
            $table->string('pw_cmc', 4)->nullable();
            $table->string('unit_cost', 10)->nullable();
            $table->string('unit_weight', 10)->nullable();
            $table->string('unit_meas', 10)->nullable();
            $table->string('encoded_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['participant_id', 'record_date', 'line_no']);
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
        Schema::dropIfExists('record_data');
    }
}
