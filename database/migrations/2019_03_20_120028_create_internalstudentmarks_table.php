<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternalstudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internalstudentmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('classyear_id');            
            $table->biginteger('department_id');            
            $table->biginteger('student_id');            
            $table->biginteger('subject_id');  
            $table->string('Obtained_Mark');
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
        Schema::dropIfExists('internalstudentmarks');
    }
}
