<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('participant_id', 10)->unique();
            $table->string('full_name', 50);
            $table->integer('sex');
            $table->integer('csc');
            $table->string('birth_date', 20);
            $table->float('age', 6, 4);
            $table->string('educ_attainment', 2);
            $table->string('specify_educ', 100)->nullable();
            $table->string('occupation', 100);
            $table->string('home_address', 150);
            $table->string('contact', 15);
            $table->tinyInteger('is_agreed')->default('0')->nullable();
            $table->string('assent_date', 20)->nullable();
            $table->string('witness_name', 50)->nullable();
            $table->string('witness_mobile', 15)->nullable();
            $table->string('witness_address', 250)->nullable();
            $table->string('researcher_name', 50)->nullable();
            $table->string('researcher_date', 20)->nullable();
            $table->tinyInteger('is_transmitted')->default('0')->nullable();
            $table->string('encoded_by', 20)->nullable();
            $table->string('updated_by', 20)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
