<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('FirstName');
            $table->string('SecondName');
            $table->string('ThirdName');
            $table->string('FourthName');
            $table->string('relative_relation');
            $table->date('Date_of_Birth');
            $table->string('Social_status');
            $table->string('Study');
            $table->string('work');
            $table->string('image')->default('default.jpg');
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
        Schema::dropIfExists('kinships');
    }
}
