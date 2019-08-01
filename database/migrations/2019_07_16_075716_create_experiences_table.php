<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Workplace');
            $table->string('Job_title');
            $table->date('Start_Date');
            $table->date('Expiry_date');
            $table->string('Salary');
            $table->string('coin');
            $table->string('details');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('infos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
