<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Department_Name');
            $table->timestamps();
        });
        Schema::create('classyears', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('department_id');
            $table->string('Classyear_Name');
            $table->string('subject_ids');
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('department_id');
            $table->biginteger('classyear_id');            
            $table->string('Student_Name');
            $table->string('Admission_No')->unique();
            $table->date('DOB');
            $table->text('Address'); 
            $table->string('Email');
            $table->string('Mobile_No');
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
        Schema::dropIfExists('students');
    }
}
