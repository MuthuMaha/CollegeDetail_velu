<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendstudent extends Model
{
	protected $table='attendstudents';
    protected $fillable=['attendance_id', 'student_id', 'Attendance',];
}
